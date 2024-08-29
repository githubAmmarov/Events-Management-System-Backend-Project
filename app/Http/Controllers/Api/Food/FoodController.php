<?php

namespace App\Http\Controllers\Api\Food;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreFoodRequest as ApiStoreFoodRequest;
use App\Http\Requests\Api\UpdateFoodRequest as ApiUpdateFoodRequest;
use App\Models\Food;
use App\Http\Responses\Response;
use App\Models\FoodCategory;
use App\Models\Media;
use App\Repositories\Classes\FoodRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    protected $foodService;
    protected $foodRepository;

    public function __construct(FoodRepository $foodRepository)
    {
        // $this->accessoryService = $accessoryService;
        $this->foodRepository = $foodRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->foodRepository->index();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ApiStoreFoodRequest $request)
    {
{
    $validateData = $request->validated();


    return DB::transaction(function () use ($validateData, $request) {
        $foodCategory = FoodCategory::query()->where('category', $validateData['food_category'])->firstOrFail();

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
            'food_category_id' => $foodCategory->id,
            'media_id' => $media ? $media->id : null,
            'name' => $validateData['name'],
            'price' => $validateData['price'],
            'description' => $validateData['description']
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
    public function update(ApiUpdateFoodRequest $request, $id)
    {
        $validatedData = $request->validate([
            'food_category' => 'nullable|string|exists:food_categories,category',
            'media' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'nullable|string',
            'price' => 'nullable|integer|min:1'
        ]);

        return DB::transaction(function () use ($validatedData, $request, $id) {
            $food = Food::findOrFail($id);
            $foodCategory = FoodCategory::query()->where('category', $validatedData['food_category'])->first();

            $media = $food->media;
            if ($request->hasFile('media')) {
                if ($media) {
                    Storage::disk('public')->delete(str_replace('storage/', '', $media->media_url));
                }
                $file = $request->file('media');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $mediaPath = $file->storeAs('accessories', $fileName, 'public');

                $media = Media::create([
                    'media_url' => 'storage/' . $mediaPath
                ]);
            }
                $food->update(array_filter([
                'accessory_type_id' => $foodCategory->id,
                'media_id' => $media ? $media->id : $food->media_id,
                'name' => $validatedData['name'] ?? $food->name,
                'price' => $validatedData['price'] ?? $food->price,
            ]));
            $food->save();

            $message = 'Food Updated Successfully';
            return response()->json([
                'message' => $message,
                'accessory_data' => $food,
                'image_url' => $media ? url($media->media_url) : ($food->media ? url($food->media->media_url) : null)
            ], 200);
        });

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        if ($food->media) {
            Storage::disk('public')->delete(str_replace('storage/', '', $food->media->media_url));
            $food->media->delete();
        }
        $food->delete();
        $message = 'food deleted successfully';
        return response()->json([
            'message' => $message
        ], 200);
    }
}
