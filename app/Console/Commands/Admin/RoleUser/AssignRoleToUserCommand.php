<?php

namespace App\Console\Commands\Admin\RoleUser;

use App\Models\{Role, User};
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AssignRoleToUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:assign {role} {userId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign role to user';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        try {
            DB::beginTransaction();

            $roleName = $this->argument('role');
            if (!isset($roleName)) {
                throw new \Exception('No role name provided');
            }

            $userId = $this->argument('userId');
            if (!isset($userId)) {
                throw new \Exception('No user id provided');
            }

            $user = User::find($userId);
            if (is_null($user)) {
                throw new \Exception('No user with provided id existing');
            }
            $role = Role::where(['name' => $roleName])->first();
            if (is_null($role)) {
                throw new \Exception('No role with provided role name existing');
            }
            if ($user->roles->contains($role->id)) {
                throw new \Exception("Role $roleName has already been assigned to user $user->name");
            }

            $user->roles()->attach($role->id);

            DB::commit();

            $this->info("Role $roleName successfully assigned to user $user->name");
        } catch (\Exception $e) {
            DB::rollBack();

            $this->error($e->getMessage(), $e->getTraceAsString());
        }
    }
}
