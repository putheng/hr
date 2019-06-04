<?php

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
        	['name' => 'create package'],
        	['name' => 'edit package'],
        	['name' => 'delete package'],
        ];

        $admin = Role::findByName('admin');

        foreach ($permissions as $item) {
        	$permission = Permission::create($item);
        	$permission->assignRole($admin);
        }
    }
}
