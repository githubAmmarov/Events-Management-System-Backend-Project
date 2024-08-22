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
    public function index():array
    {
        $data =Food::paginate(10);
        if ($data->isEmpty()){
            $message="There are no food at the moment";
        }else
        {
            $message="Food indexed successfully";
        }
        return ['message'=>$message,"Food"=>$data];
    }
}
