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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
        	['name' => 'create package'],
        	['name' => 'edit package'],
        	['name' => 'delete package'],

        	['name' => 'create listing'],
        	['name' => 'edit listing'],
        	['name' => 'delete listing'],

        	['name' => 'create resume'],
        	['name' => 'edit resume'],
            ['name' => 'delete resume'],

        	['name' => 'buy package'],
        ];

        foreach ($permissions as $item) {
        	Permission::create($item);
        }

        // create roles and assign created permissions
        Role::create(['name' => 'admin'])
            ->givePermissionTo(['create package', 'edit package', 'delete package', 'buy package']);

        Role::create(['name' => 'employer'])
        	->givePermissionTo(['create listing', 'edit listing', 'delete listing', 'buy package']);

        Role::create(['name' => 'jobseeker'])
        	->givePermissionTo(['create resume', 'edit resume', 'delete resume']);

        Role::create(['name' => 'super-admin'])
       		->givePermissionTo(Permission::all());
    }
}
