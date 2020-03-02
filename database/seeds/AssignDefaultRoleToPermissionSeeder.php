<?php

use App\Models\Permission;
use App\Models\Role;
use App\User;
use Illuminate\Database\Seeder;

class AssignDefaultRoleToPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Role $adminRole */
        $adminRole = Role::whereName('Admin')->first();

        $permissions = Permission::all();
        $adminRole->givePermissionTo($permissions);

        /** @var User $user */
        $user = User::whereEmail('admin@gmail.com')->first();
        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
