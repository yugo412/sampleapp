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
        $role = Role::firstOrCreate(['name' => AuthServiceProvider::ADMIN_ROLE]);
        foreach (config('permission.all') as $permission) {
            $permission = Permission::firstOrCreate(['name' => $permission]);

            $role->givePermissionTo($permission);
        }
    }
}
