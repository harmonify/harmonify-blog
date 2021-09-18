<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 2,
        ]);
        User::create([
            'name' => 'Superuser',
            'username' => 'superuser',
            'email' => 'superuser@gmail.com',
            'password' => bcrypt('superuser'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
        ]);
        User::factory(20)->create();
    }
}
