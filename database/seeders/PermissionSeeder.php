<?php

namespace Database\Seeders;

use App\Providers\AuthServiceProvider;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'view user',
            'edit user',
            'delete user',
            'disable user 2fa',
            'view role',
            'delete role',
            'edit role',
            'delete role',
            'view permission',
        ];

        $role = Role::firstOrCreate(['name' => AuthServiceProvider::ADMIN_ROLE]);
        foreach ($permissions as $permission) {
            $permission = Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => config('auth.defaults.guard'),
            ]);

            $role->givePermissionTo($permission);
        }
    }
}
