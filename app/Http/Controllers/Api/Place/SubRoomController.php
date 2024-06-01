<?php

namespace App\Http\Controllers\Api\Place;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreSubRoomRequest as ApiStoreSubRoomRequest;
use App\Http\Requests\Api\UpdateSubRoomRequest as ApiUpdateSubRoomRequest;
use App\Models\SubRoom;
use App\Http\Requests\StoreSubRoomRequest;
use App\Http\Requests\UpdateSubRoomRequest;
use App\Models\Place;
use Illuminate\Http\Request;

class SubRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        //
        $id=$request->validate([
            'id'=>'integer'
        ]);
        $place_id = Place::find($id['id']); 
        return SubRoom::where('place_id', $place_id->id)->with('place')->with('place_room_type')->with('media')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApiStoreSubRoomRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SubRoom $subRoom)
    {
        //
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
