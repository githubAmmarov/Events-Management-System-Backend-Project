<?php

namespace App\Http\Controllers\Api\Accessory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreAccessoryTypeRequest as ApiStoreAccessoryTypeRequest;
use App\Http\Requests\Api\UpdateAccessoryTypeRequest as ApiUpdateAccessoryTypeRequest;
use App\Models\AccessoryType;
use App\Http\Requests\StoreAccessoryTypeRequest;
use App\Http\Requests\UpdateAccessoryTypeRequest;
use App\Http\Responses\Response;
use App\Models\Accessory;

class AccessoryTypeController extends Controller
{


    public function index($id)
    {
        $accessoryType = [];
        try {
            $accessoryType = AccessoryType::query()->findOrFail($id);
            $message = "this is $id th Accessory Type";

            return Response::Success($accessoryType ,$message,200);
        } catch (\Exception $e){
            $message = $e->getMessage();
            return Response::Error($message, $e->getMessage(), 500);
        }
    }

    public function indexForType($id)
    {
        $accessory = [];
        try {
        $accessoryType = AccessoryType::query()->findOrFail($id);
        $accessory = Accessory::query()->where('accessory_type_id',$accessoryType->id)->with('media')->with('accessory_type')->get();

        $message = "These are all Accessories for $accessoryType->type";
        return response()->json([
            'Accessory_Type'=>$accessoryType,
            'Accessories_For_Type' => $accessory,
            'message' => $message,
        ],200);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return Response::Error($message, $e->getCode(),500);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ApiStoreAccessoryTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AccessoryType $accessoryType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccessoryType $accessoryType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiUpdateAccessoryTypeRequest $request, AccessoryType $accessoryType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccessoryType $accessoryType)
    {
        //
    }
}
