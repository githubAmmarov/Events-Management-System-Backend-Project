<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\Place;

class PlaceRepository extends baseRepository
{
    public function __construct(Place $place)
    {
        parent::__construct($place);
    }
}
