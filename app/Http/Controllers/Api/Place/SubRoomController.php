<?php

namespace App\Http\Controllers\Api\Place;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreSubRoomRequest as ApiStoreSubRoomRequest;
use App\Http\Requests\Api\UpdateSubRoomRequest as ApiUpdateSubRoomRequest;
use App\Models\SubRoom;
use App\Http\Requests\StoreSubRoomRequest;
use App\Http\Requests\UpdateSubRoomRequest;
use App\Http\Responses\Response;
use App\Models\Media;
use App\Models\Place;
use App\Models\PlaceRoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class SubRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subrooms = [];
        $message = "these are all place's subrooms";
        try {
            $id=$request->validate([
                'id'=>'integer'
            ]);
            $place = Place::find($id['id']);
            $message = "these are all $place->name subrooms";
            $subrooms = SubRoom::where('place_id', $place->id)->with('place')->with('media')->get();
            return Response::Success($subrooms,$message);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            return Response::Error($subrooms, $message);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApiStoreSubRoomRequest $request)
    {
        $validateData = $request->validated();

    return DB::transaction(function () use (& $validateData, $request) {
        $PlaceRoomType = PlaceRoomType::query()->where('name', $validateData['place_room_type'])->firstOrFail();
        $place = Place::query()->where('name', $validateData['place_name'])->firstOrFail();

        $media = null;
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $mediaPath = $file->storeAs('places', $fileName, 'public');

            $media = Media::create([
                'media_url' => 'storage/' . $mediaPath
            ]);
        }



        $SubRoom = SubRoom::create([
            'place_id' => $place->id,
            // 'place_room_type_id' => $PlaceRoomType->id,
            'media_id' => $media ? $media->id : null,
            'name' => $validateData['name'],
            'capacity' => $validateData['capacity'],
            'cost' => $validateData['cost']
        ]);

        $message = 'SubRoom created successfully';

        return response()->json([
            'message' => $message,
            'subroom_data' => $SubRoom,
            'image_url' => $media ? url($media->media_url) : null
        ], 201);
    });
}


    /**
     * Display the specified resource.
     */
    public function show(SubRoom $subRoom)
    {
        $subroom = [];
        $message = "this is subroom's information";
        try {
            $subroom = SubRoom::where('id',$subRoom->id)->with('media','place','reservations')->first();
            return Response::Success($subroom,$message);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            return Response::Error($subroom, $message);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubRoom $subRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiUpdateSubRoomRequest $request, SubRoom $subRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubRoom $subRoom)
    {
        //
    }
}
