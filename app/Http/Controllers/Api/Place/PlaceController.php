<?php

namespace App\Http\Controllers\Api\Place;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorePlaceRequest as ApiStorePlaceRequest;
use App\Http\Requests\Api\UpdatePlaceRequest as ApiUpdatePlaceRequest;
use App\Models\Place;
use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Http\Responses\Response;
use App\Models\PlaceRoomType;
use App\Models\SubRoom;
use Illuminate\Http\Request;
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
        //
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
                "SubRooms"=>SubRoom::query()->where('place_id',$place->id)->with('place_room_type','media')->get()
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
    public function destroy(Place $place)
    {
        //
    }
}
