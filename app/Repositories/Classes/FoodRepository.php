<?php

namespace App\Repositories\Classes;

use App\Models\Food;
use App\Repositories\baseRepository;

class FoodRepository extends baseRepository
{
    public function __construct(Food $food)
    {
        parent::__construct($food);
    }
}
