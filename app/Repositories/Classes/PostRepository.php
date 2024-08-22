<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\Post;

class PostRepository extends baseRepository
{
    public function __construct(Post $post)
    {
        parent::__construct($post);
    }
}
