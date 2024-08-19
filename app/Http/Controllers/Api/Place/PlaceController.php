<?php

namespace App\Http\Controllers\Api\Place;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorePlaceRequest as ApiStorePlaceRequest;
use App\Http\Requests\Api\UpdatePlaceRequest as ApiUpdatePlaceRequest;
use App\Models\Place;
use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Http\Responses\Response;
use App\Models\Media;
use App\Models\PlaceRoomType;
use App\Models\SubRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $name=$request->validate([
            'name'=>'string',
        ]);
        $message = "these are all " . $name['name'];
        $place_room_type_id = PlaceRoomType::where('name', $name)->first();

        $places = [];
        try {
            $places = Place::where('place_room_type_id', $place_room_type_id->id)->with('place_room_type')->with('media')->get();
            return Response::Success($places,$message);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            return Response::Error($places, $message);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ApiStorePlaceRequest $request)
    {
        $validateData = $request->validated();


    return DB::transaction(function () use (& $validateData, $request) {
        $PlaceRoomType = PlaceRoomType::query()->where('name', $validateData['place_room_type'])->firstOrFail();

        $media = null;
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $mediaPath = $file->storeAs('places', $fileName, 'public');

            $media = Media::create([
                'media_url' => 'storage/' . $mediaPath
            ]);
        }


        $place = Place::create([
            'place_room_type_id' => $PlaceRoomType->id,
            'media_id' => $media ? $media->id : null,
            'name' => $validateData['name'],
            'phone_number' => $validateData['phone_number'],
            'address' => $validateData['address']
        ]);

        $message = 'place created successfully';

        return response()->json([
            'message' => $message,
            'place_data' => $place,
            'image_url' => $media ? url($media->media_url) : null
        ], 201);
    });
}

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        //
        $info = [];
        $message = "this is place's information";
        try {
            $info = [
                "Place"=>Place::query()->where('id',$place->id)->with('place_room_type','media')->first(),
                "SubRooms"=>SubRoom::query()->where('place_id',$place->id)->with('media')->get()
        ];
            return Response::Success($info,$message);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            return Response::Error($info, $message);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiUpdatePlaceRequest $request, Place $place)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Place = Place::findOrFail($id);
        if ($Place->media) {
            Storage::disk('public')->delete(str_replace('storage/', '', $Place->media->media_url));
            $Place->media->delete();
        }
        $Place->delete();
        $message = 'Place deleted successfully';
        return response()->json([
            'message' => $message
        ], 200);
    }
}
