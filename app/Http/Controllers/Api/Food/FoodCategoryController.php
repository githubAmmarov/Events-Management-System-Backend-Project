<?php

namespace App\Http\Controllers\Api\Food;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreFoodCategoryRequest as ApiStoreFoodCategoryRequest;
use App\Http\Requests\Api\UpdateFoodCategoryRequest as ApiUpdateFoodCategoryRequest;
use App\Models\FoodCategory;
use App\Http\Responses\Response;
use App\Models\Food;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function foodCategory($id)
    {
        $Foods = [];
        try {
        $Foods = FoodCategory::query()->findOrFail($id);
        $message = 'This is Food Category for this ID';
        return Response::Success($Foods, $message,200);
        } catch (\Exception $e) {
            $message = $e->getMessage();
        return Response::Error($message, $e->getCode(),500);
        }
    }

    public function foodCategories()
    {
        $Foods = [];
        try {
        $Foods = FoodCategory::query()->get();
        $message = 'These are all Food Categories in our application';
        return Response::Success($Foods, $message,200);
        } catch (\Exception $e) {
            $message = $e->getMessage();
        return Response::Error($message, $e->getCode(),500);
        }
    }

    public function foodsForCategory($id)
    {

        $food = [];
        try {
            $FoodCategory = FoodCategory::query()->findOrFail($id);
            $food = Food::query()
            ->where('food_category_id',$FoodCategory->id)
            ->with('food_category')
            ->with('media')
            ->get();

        $message = "These are all Food for $FoodCategory->category";
        return response()->json([
            'status' => true,
            'Category'=>$FoodCategory,
            'Foods_For_Category' => $food,
            'message'=>$message,
            ],200);

        } catch (\Exception $e) {
            $message = $e->getMessage();
            return Response::Error($message, $e->getCode(),500);
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
    public function store(ApiStoreFoodCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FoodCategory $foodCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FoodCategory $foodCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiUpdateFoodCategoryRequest $request, FoodCategory $foodCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FoodCategory $foodCategory)
    {
        //
    }
}
