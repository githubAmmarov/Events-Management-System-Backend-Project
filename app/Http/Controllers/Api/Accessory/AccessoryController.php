<?php

namespace App\Http\Controllers\Api\Accessory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreAccessoryRequest as ApiStoreAccessoryRequest;
use App\Http\Requests\Api\UpdateAccessoryRequest as ApiUpdateAccessoryRequest;
use App\Http\Resources\AccessoryResource;
use App\Models\Accessory;
use App\Http\Responses\Response;
use App\Models\AccessoryType;
use App\Models\Media;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;

class AccessoryController extends Controller
{
    protected $accessoryService;

    // public function __construct(AccessoryServiceInterface $accessoryServiceInterface)
    // {
    //     $this->accessoryService = $accessoryServiceInterface;
    // }
    public function index(): JsonResponse
    {
        $accessories = [];
        try {
            $message = 'these are all accessories';
        $accessories= Accessory::with(['media','accessory_type'])->get();

            return Response::Success(AccessoryResource::collection($accessories), $message, 200);
        } catch (Exception $e) {
            $logId = uniqid('log_');
            $error = "Failed to retrieve accessories. please contact support with log ID: " . $logId;
            return Response::error($error, [
                'Error_details' => $e->getMessage(),
                'File' => $e->getFile(),
                'Line' => $e->getLine(),
            ], 500);
        }
    }

    public function indexItem($id)
    {
        $accessory = [];
        try {
            $message = "this is accessory for $id th id";
            // $accessory = $this->accessoryService->getAccessoryItem($id);
        $accessory= Accessory::query()->with('media')->with('accessory_type')->findOrFail($id);

            return Response::Success($accessory,$message,200);
        } catch (Throwable $e) {
            $message = $e->getMessage();
            $error = "Failed to retrieve accessories.";
            return Response::error($error, [
                'Error_details' => $e->getMessage(),
                'File' => $e->getFile(),
                'Line' => $e->getLine(),
            ], 500);
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
    $validateData = $request->validated();

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
        $validatedData = $request->validated();

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
