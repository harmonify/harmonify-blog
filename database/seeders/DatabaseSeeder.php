<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Models\Category;
// use App\Models\Post;
// use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
        ]);
        // User::factory(20)->create();
        // Post::factory(40)->create();
        // Category::factory(10)->create();
    }
}
