<?php

namespace App\Http\Controllers\Api\Food;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreFoodRequest as ApiStoreFoodRequest;
use App\Http\Requests\Api\UpdateFoodRequest as ApiUpdateFoodRequest;
use App\Models\Food;
use App\Http\Responses\Response;
use App\Models\FoodCategory;
use App\Models\Media;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function allFoods(): JsonResponse
    {
        $foods = [];
        try {
            $foods = Food::query()
            ->with('media')
            ->with('food_category')
            ->get();
            $message = 'These are all food';
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
{
    $validateData = $request->validate([
            'food_category' => 'required|string|exists:food_categories,category',,
            'name' => 'required|string',
            'price' => 'required|integer|min:1',
            'description' => 'sometimes|string',
            'media' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    return DB::transaction(function () use ($validateData, $request) {
        $foodCategory = FoodCategory::query()->where('type', $validateData['accessory_type'])->firstOrFail();

        $media = null;
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $mediaPath = $file->storeAs('foods', $fileName, 'public');

            $media = Media::create([
                'media_url' => 'storage/' . $mediaPath
            ]);
        }

        $food = Food::create([
            'accessory_type_id' => $foodCategory->id,
            'media_id' => $media ? $media->id : null,
            'name' => $validateData['name'],
            'price' => $validateData['price'],
        ]);

        $message = 'Food created successfully';

        return response()->json([
            'message' => $message,
            'food_data' => $food,
            'image_url' => $media ? url($media->media_url) : null
        ], 201);
    });
}

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
