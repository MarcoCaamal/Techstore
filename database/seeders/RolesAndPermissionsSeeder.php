<?php

namespace Database\Seeders;

use App\Models\Auth\Permission;
use App\Models\Auth\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            // User management
            'users.view',
            'users.create',
            'users.edit',
            'users.delete',

            // Role management
            'roles.view',
            'roles.create',
            'roles.edit',
            'roles.delete',
            'roles.assign',

            // Permission management
            'permissions.view',
            'permissions.create',
            'permissions.edit',
            'permissions.delete',

            // Product management (for your tech store)
            'products.view',
            'products.create',
            'products.edit',
            'products.delete',

            // Category management
            'categories.view',
            'categories.create',
            'categories.edit',
            'categories.delete',

            // Order management
            'orders.view',
            'orders.create',
            'orders.edit',
            'orders.delete',
            'orders.process',

            // Report access
            'reports.view',
            'reports.export',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $superAdminRole = Role::firstOrCreate(['name' => 'admin']);
        $customerRole = Role::firstOrCreate(['name' => 'customer']);
        $managerRole = Role::firstOrCreate(['name' => 'manager']);

        // Assign permissions to roles
        $allPermissions = Permission::all();

        // Admin gets all permissions
        $superAdminRole->permissions()->sync($allPermissions->pluck('id'));

        // Customer gets minimal permissions
        $customerPermissions = $allPermissions->whereIn('name', [
            'products.view',
            'categories.view',
            'orders.create',
            'orders.view'
        ]);
        $customerRole->permissions()->sync($customerPermissions->pluck('id'));

        // Manager gets product, category, and order management
        $managerPermissions = $allPermissions->whereIn('name', [
            'products.view', 'products.create', 'products.edit',
            'categories.view', 'categories.create', 'categories.edit',
            'orders.view', 'orders.edit', 'orders.process',
            'reports.view'
        ]);
        $managerRole->permissions()->sync($managerPermissions->pluck('id'));

        $this->command->info('Roles and permissions created successfully!');
    }
}
