<?php

namespace Database\Seeders;

use App\Models\media_post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class media_postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        media_post::factory()->count(500)->create();    }
}
