<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // $this->disableForeignKeys();
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Roles
        $administrator = Role::updateOrCreate(['name' => 'administrator']);
        $writer = Role::updateOrCreate(['name' => 'writer']);
        $editor = Role::updateOrCreate(['name' => 'editor']);
        $publisher = Role::updateOrCreate(['name' => 'publisher']);
        
        // Create Permissions
        $permissions = ['view backend', 'view post', 'write post'];

        foreach ($permissions as $permission) {
        Permission::updateOrCreate(['name' => $permission]);
        }

        // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
        $administrator->givePermissionTo(Permission::all());

        // Assign Permissions to itadmin
        $writer->givePermissionTo(['view post','write post']);

        // Assign Permissions to it
        $editor->givePermissionTo(['view post']);

        // Assign Permissions to employee
        $publisher->givePermissionTo(['view post']);

        // $this->enableForeignKeys();
    }
}
