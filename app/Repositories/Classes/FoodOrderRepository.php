<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\FoodOrder;

class FoodOrderRepository extends baseRepository
{
    public function __construct(FoodOrder $foodOrder)
    {
        parent::__construct($foodOrder);
    }
}
