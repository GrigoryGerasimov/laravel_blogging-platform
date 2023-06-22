<?php

namespace App\Console\Commands\Admin\RoleUser;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RevokeRoleFromUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:revoke {role} {userId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Revoke role from user';

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
            if ($user->roles->doesntContain($role->id)) {
                throw new \Exception("Role $roleName has not been assigned to user $user->name");
            }

            $user->roles()->detach($role->id);

            DB::commit();

            $this->info("Role $roleName successfully revoked from user $user->name");
        } catch (\Exception $e) {
            DB::rollBack();

            $this->error($e->getMessage(), $e->getTraceAsString());
        }
    }
}
