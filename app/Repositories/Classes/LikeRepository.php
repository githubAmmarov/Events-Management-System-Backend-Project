<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\Like;

class LikeRepository extends baseRepository
{
    public function __construct(Like $like)
    {
        parent::__construct($like);
    }
}
