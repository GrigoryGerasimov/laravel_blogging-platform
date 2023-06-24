<?php

namespace App\Jobs\User;

use App\Mail\{SendUpdatedUserLoginMailWithQueue, SendUpdatedUserPasswordMailWithQueue};
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserUpdateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct
    (
        protected Model $userModel,
        protected array $userData
    )
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            DB::beginTransaction();

            $userRoles = $this->userData['role_ids'];
            unset($this->userData['role_ids']);

            if ($this->userData['password'] !== $this->userModel->password) {
                Mail::to($this->userData['email'])->send((new SendUpdatedUserPasswordMailWithQueue($this->userModel->name, $this->userData['password']))->afterCommit());
            }
            if ($this->userData['email'] !== $this->userModel->email) {
                Mail::to($this->userData['email'])->send((new SendUpdatedUserLoginMailWithQueue($this->userModel->name, $this->userData['email']))->afterCommit());
            }

            $this->userData['password'] = Hash::make($this->userData['password']);

            $this->userModel->update($this->userData);
            $this->userModel->roles()->sync($userRoles);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage(), $e->getTrace());
            abort(505);
        }
    }
}
