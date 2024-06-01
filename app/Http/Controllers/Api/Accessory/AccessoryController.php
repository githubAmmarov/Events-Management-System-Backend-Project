<?php

namespace App\Http\Controllers\Api\Accessory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreAccessoryRequest as ApiStoreAccessoryRequest;
use App\Http\Requests\Api\UpdateAccessoryRequest as ApiUpdateAccessoryRequest;
use App\Models\Accessory;
use App\Http\Requests\StoreAccessoryRequest;
use App\Http\Requests\UpdateAccessoryRequest;

class AccessoryController extends Controller
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
    public function store(ApiStoreAccessoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Accessory $accessory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accessory $accessory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiUpdateAccessoryRequest $request, Accessory $accessory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accessory $accessory)
    {
        //
    }
}
