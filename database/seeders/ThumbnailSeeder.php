<?php

namespace Database\Seeders;

use App\Models\Thumbnail;
use Illuminate\Database\Seeder;

class ThumbnailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Thumbnail::create([
            'name' => 'Sample 1',
            'slug' => 'sample-1',
            'url' => 'https://cdn.discordapp.com/attachments/890164256992018433/890164370720563210/keyboard1.jpg',
        ]);

        Thumbnail::create([
            'name' => 'Sample 2',
            'slug' => 'sample-2',
            'url' => 'https://cdn.discordapp.com/attachments/890164256992018433/890164377116880896/keyboard3.jpg',
        ]);

        Thumbnail::create([
            'name' => 'Sample 3',
            'slug' => 'sample-3',
            'url' => 'https://cdn.discordapp.com/attachments/890164256992018433/890164379859943444/keyboard5.jpg',
        ]);
    }
}
