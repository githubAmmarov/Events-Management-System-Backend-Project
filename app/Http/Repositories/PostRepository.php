<?php

namespace App\Http\Repositories;

use App\Models\Post;

class PostRepository extends baseRepository
{
    public function __construct(Post $post)
    {
        parent::__construct($post);
    }
}
