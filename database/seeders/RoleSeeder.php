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
            'name' => 'basic',
        ]);

        Role::create([
            'name' => 'administrator',
        ]);

        Role::create([
            'name' => 'superuser',
        ]);
    }
}
