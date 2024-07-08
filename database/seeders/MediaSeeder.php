<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Media::create([
            'media_url' => 'images/' . 'testImage.jpg',
        ]);
        Media::factory()->count(300)->create();
    }
}
