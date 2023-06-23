<?php

namespace App\Jobs;

use App\Mail\SendRegisteredUserCredentialsMailWithQueue;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserStoreJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param array $userData
     */
    public function __construct
    (
        protected array $userData
    ) {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        try {
            DB::beginTransaction();

            $userRoles = $this->userData['role_ids'];
            unset($this->userData['role_ids']);

            $password = Str::random(18);
            $this->userData['password'] = Hash::make($password);

            $user = User::firstOrCreate(['email' => $this->userData['email']], $this->userData);
            $user->roles()->attach($userRoles);

            Mail::to($user->email)->send(new SendRegisteredUserCredentialsMailWithQueue($user->name, $user->email, $password));
            event(new Registered($user));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage(), $e->getTrace());
            abort(505);
        }
    }
}
