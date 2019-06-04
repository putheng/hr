<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = [
    		['name' => 'admin'],
    		['name' => 'seeker'],
    		['name' => 'employer'],
    	];

        foreach ($roles as $key => $role) {
        	Role::create($role);
        }
    }
}
