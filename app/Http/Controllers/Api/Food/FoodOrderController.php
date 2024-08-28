<?php

namespace App\Http\Controllers\Api\Food;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreFoodItemRequest as ApiStoreFoodItemRequest;
use App\Http\Requests\Api\UpdateFoodItemRequest as ApiUpdateFoodItemRequest;
use App\Models\Food;
use App\Http\Responses\Response;
use App\Models\FoodItem;
use Illuminate\Support\Facades\Request;

class FoodOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function foodItem(Request $request ,$id)
    {
        $item = [];
        try {
        $item = Food::query()->with("media")->with("food_category")->findOrFail($id);
        $message = 'This is Food Item For This ID';
        return Response::Success($item,$message,200);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return Response::Error($e->getMessage(),$message,404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApiStoreFoodItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FoodItem $foodItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FoodItem $foodItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiUpdateFoodItemRequest $request, FoodItem $foodItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FoodItem $foodItem)
    {
        //
    }
}
