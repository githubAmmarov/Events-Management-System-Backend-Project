<?php

namespace Database\Seeders;

use App\Models\media_post;
use App\Models\mediaPost;
use App\Models\Post;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{

    public function run(): void
    {
        Post::factory()->count(100)->create();
        // media_post::factory()->count(100)->create();
    }
}
