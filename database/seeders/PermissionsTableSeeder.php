<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'dashboards.index',

            'stores.index',

            'products.index',
            'products.create',
            'products.show',
            'products.edit',
            'products.destroy',

            'coins.index',
            'coins.create',
            'coins.show',
            'coins.edit',
            'coins.destroy',

            'clients.index',
            'clients.create',
            'clients.show',
            'clients.edit',
            'clients.destroy',

            'orders.index',
            'orders.create',
            'orders.show',
            'orders.edit',
            'orders.destroy',

            'sales.index',
            'sales.create',
            'sales.show',
            'sales.edit',
            'sales.destroy',

            'reports.index',
            'reports.create',
            'reports.show',
            'reports.edit',
            'reports.destroy',

            'access.index',

            'roles.index',
            'roles.create',
            'roles.show',
            'roles.edit',
            'roles.destroy',

            'permissions.index',
            'permissions.create',
            'permissions.show',
            'permissions.edit',
            'permissions.destroy',

            'assignments.index',
            'assignments.create',
            'assignments.show',
            'assignments.edit',
            'assignments.destroy',

            'users.index',
            'users.create',
            'users.show',
            'users.edit',
            'users.destroy',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
