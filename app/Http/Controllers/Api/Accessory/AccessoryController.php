<?php

namespace App\Http\Controllers\Api\Accessory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreAccessoryRequest as ApiStoreAccessoryRequest;
use App\Http\Requests\Api\UpdateAccessoryRequest as ApiUpdateAccessoryRequest;
use App\Models\Accessory;
use App\Http\Responses\Response;
use App\Models\AccessoryType;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accessory = [];
        try {
        $message = 'these are all accessories';
        $accessory = Accessory::query()
        ->with('media')
        ->with('accessory_type')
        ->get();
        return Response::Success($accessory,$message,200);

        } catch (\Exception $e) {
            $message = $e->getMessage();
            return Response::Error($e->getMessage(),$message,400);
        }
    }

    public function indexItem($id)
    {
        $accessory = [];
        try {
        $accessory = Accessory::query()
        ->with('media')
        ->with('accessory_type')
        ->findOrFail($id);

        $message = "this is accessory for $id th id";
        return Response::Success($accessory,$message,200);

        } catch (\Exception $e) {
            $message = $e->getMessage();
            return Response::Error($e->getMessage(),$message,400);
        }
    }



    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApiStoreAccessoryRequest $request)
{
    $validateData = $request->validate([
        'accessory_type' => 'required|string|exists:accessory_types,type',
        'media' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'name' => 'required|string',
        'price' => 'required|integer|min:1'
    ]);

    return DB::transaction(function () use ($validateData, $request) {
        $accessoryType = AccessoryType::query()->where('type', $validateData['accessory_type'])->firstOrFail();

        $media = null;
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $mediaPath = $file->storeAs('accessories', $fileName, 'public');

            $media = Media::create([
                'media_url' => 'storage/' . $mediaPath
            ]);
        }

        $accessory = Accessory::create([
            'accessory_type_id' => $accessoryType->id,
            'media_id' => $media ? $media->id : null,
            'name' => $validateData['name'],
            'price' => $validateData['price'],
        ]);

        $message = 'Accessory created successfully';

        return response()->json([
            'message' => $message,
            'accessory_data' => $accessory,
            'image_url' => $media ? url($media->media_url) : null
        ], 201);
    });
}

    public function update(ApiUpdateAccessoryRequest $request, $id)
    {
        $validatedData = $request->validate([
            'accessory_type' => 'nullable|string|exists:accessory_types,type',
            'media' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'nullable|string',
            'price' => 'nullable|integer|min:1'
        ]);

        return DB::transaction(function () use ($validatedData, $request, $id) {
            $accessory = Accessory::findOrFail($id);
            $accessoryType = AccessoryType::query()->where('type', $validatedData['accessory_type'])->first();

            $media = $accessory->media;
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
                $accessory->update(array_filter([
                'accessory_type_id' => $accessoryType->id,
                'media_id' => $media ? $media->id : $accessory->media_id,
                'name' => $validatedData['name'] ?? $accessory->name,
                'price' => $validatedData['price'] ?? $accessory->price,
            ]));
            $accessory->save();

            $message = 'Accessory Updated Successfully';
            return response()->json([
                'message' => $message,
                'accessory_data' => $accessory,
                'image_url' => $media ? url($media->media_url) : ($accessory->media ? url($accessory->media->media_url) : null)
            ], 200);
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $accessory = Accessory::findOrFail($id);
        if ($accessory->media) {
            Storage::disk('public')->delete(str_replace('storage/', '', $accessory->media->media_url));
            $accessory->media->delete();
        }
        $accessory->delete();
        $message = 'Accessory deleted successfully';
        return response()->json([
            'message' => $message
        ], 200);

    }
}
