<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'User',
            'guard_name' => 'user',
        ]);

        Role::create([
            'name' => 'Administrator',
            'guard_name' => 'admin',
        ]);

        Role::create([
            'name' => 'Superuser',
            'guard_name' => 'superuser',
        ]);
    }
}
