<?php

namespace App\Http\Controllers\Api\Food;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreFoodRequest as ApiStoreFoodRequest;
use App\Http\Requests\Api\UpdateFoodRequest as ApiUpdateFoodRequest;
use App\Models\Food;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Http\Responses\Response;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function allFoods()
    {

        $foods = [];
        try {
            $foods = Food::query()
            ->with('media')
            ->with('food_category')
            ->get();
            $message = 'These are all accessories';
            return Response::Success($foods,$message,200);

        } catch (\Exception $e) {
            $message = $e->getMessage();
            return Response::Error($e->getMessage(),$message,400);
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
    public function store(ApiStoreFoodRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiUpdateFoodRequest $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        //
    }
}
