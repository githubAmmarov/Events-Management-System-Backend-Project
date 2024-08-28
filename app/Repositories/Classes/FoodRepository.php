<?php

namespace App\Repositories\Classes;

use App\Http\Responses\Response;
use App\Models\Food;
use App\Repositories\baseRepository;
use Exception;

class FoodRepository extends baseRepository
{
    public function __construct(Food $food)
    {
        parent::__construct($food);
    }
    public function index()
    {
        $food = Food::with('food_category','media')->get();
        $message = 'these are all Food';
        try {
            return Response::Success($food,$message);
        } catch (Exception $e) {
            $error = "Failed to retrieve accessories." ;
            return Response::Error($error, $e , 500);
        }
    }
}
