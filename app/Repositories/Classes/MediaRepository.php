<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\Media;

class MediaRepository extends baseRepository
{
    public function __construct(Media $media)
    {
        parent::__construct($media);
    }
}
