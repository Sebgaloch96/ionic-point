<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'View Jobs']);
        Permission::create(['name' => 'Apply For Jobs']);
        Permission::create(['name' => 'Create Jobs']);
        Permission::create(['name' => 'See Engineer Profiles']);
        Permission::create(['name' => 'Access Settings']);

        // Free Trial roles and permissions
        $role = Role::create(['name' => 'Engineer Free Trial'])
            ->givePermissionTo('View Jobs');

        $role = Role::create(['name' => 'Project Manager Free Trial'])
            ->givePermissionTo(['View Jobs', 'See Engineer Profiles']);

        // Roles and permissions for paid subscriptions
        $role = Role::create(['name' => 'Engineer'])
            ->givePermissionTo(['View Jobs', 'Apply For Jobs']);

        $role = Role::create(['name' => 'Project Manager'])
            ->givePermissionTo(['View Jobs', 'Create Jobs', 'See Engineer Profiles']);

        // Super Administrator
        $role = Role::create(['name' => 'Super Admin'])
            ->givePermissionTo(Permission::all());
    }
}
