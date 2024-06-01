<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FoodCategory;
use App\Http\Requests\StoreFoodCategoryRequest;
use App\Http\Requests\UpdateFoodCategoryRequest;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreFoodCategoryRequest $request)
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
    public function update(UpdateFoodCategoryRequest $request, FoodCategory $foodCategory)
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
