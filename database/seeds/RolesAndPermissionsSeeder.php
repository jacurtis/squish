<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        app()['cache']->forget('spatie.permission.cache');

        // Link permissions
        Permission::create(['name' => 'create links']);
        Permission::create(['name' => 'view links']);
        Permission::create(['name' => 'edit links']);
        Permission::create(['name' => 'delete links']);

        // Owned Link Permissions
        Permission::create(['name' => 'view owned links']);
        Permission::create(['name' => 'edit owned links']);
        Permission::create(['name' => 'delete owned links']);

        // User permissions
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        // Campaign permissions
        Permission::create(['name' => 'create campaigns']);
        Permission::create(['name' => 'view campaigns']);
        Permission::create(['name' => 'edit campaigns']);
        Permission::create(['name' => 'delete campaigns']);


        // create roles and assign created permissions

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'manager']);
        $role->givePermissionTo([
            'create campaigns',
            'view campaigns',
            'edit campaigns',
            'delete campaigns',
            'create links',
            'view links',
            'edit links',
            'delete links'
        ]);

        $role = Role::create(['name' => 'creator']);
        $role->givePermissionTo([
            'view campaigns',
            'create links',
            'view links',
            'edit owned links',
            'delete owned links'
        ]);

        $role = Role::create(['name' => 'restricted-creator']);
        $role->givePermissionTo([
            'view campaigns',
            'create links',
            'view owned links',
            'edit owned links',
            'delete owned links'
        ]);

        $role = Role::create(['name' => 'viewer']);
        $role->givePermissionTo([
            'view campaigns',
            'view links',
        ]);
    }
}
