<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BaseDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->adminUserRolesPermissions();
    }

    public function adminUserRolesPermissions(): void
    {
        $adminPermissions = [];

        foreach (config('base.permissions_admin') as $i => $permissions) {
            foreach ($permissions as $j => $permission) {
                $adminPermissions[] = [
                    'id' => strtolower(Str::ulid()),
                    'name' => $permission[0],
                    'guard_name' => 'web:admin',
                    'description' => __($permission[1]),
                    'display_order' => $i + $j / 10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        Permission::insert($adminPermissions);

        Role::insert([
            'id' => strtolower(Str::ulid()),
            'name' => 'Superadmin',
            'guard_name' => 'web:admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $role = Role::findByName('Superadmin', 'web:admin')->givePermissionTo(['*']);

        $super = Admin::create([
            'id' => strtolower(Str::ulid()),
            'name' => 'Superadmin',
            'email' => config('base.superadmin_email'),
            'password' => Hash::make('password'),
            'password_updated_at' => now(),
        ]);

        $super->assignRole($role);

        // Role::insert([
        //     'id' => strtolower(Str::ulid()),
        //     'name' => 'Admin',
        //     'guard_name' => 'web:admin',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // $role = Role::findByName('Admin', 'web:admin')->givePermissionTo([
        //     'contact.*',
        //     'news.*',
        //     'page.*',
        // ]);

        // $admin = Admin::create([
        //     'id' => strtolower(Str::ulid()),
        //     'name' => 'Admin Satu',
        //     'email' => 'admin@osvi.app',
        //     'password' => Hash::make('password'),
        //     'password_updated_at' => now(),
        // ]);

        // $admin->assignRole($role);
    }
}
