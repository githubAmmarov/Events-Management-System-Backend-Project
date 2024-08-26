<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\FoodCategory;

class FoodCategoryRepository extends baseRepository
{
    public function __construct(FoodCategory $foodCategory)
    {
        parent::__construct($foodCategory);
    }
}
