<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\PlaceType;

class PlaceTypeRepository extends baseRepository
{
    public function __construct(PlaceType $placeType)
    {
        parent::__construct($placeType);
    }
}
