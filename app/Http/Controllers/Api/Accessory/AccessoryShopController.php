<?php

namespace App\Http\Controllers\Api\Accessory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreAccessoryShopRequest as ApiStoreAccessoryShopRequest;
use App\Http\Requests\Api\UpdateAccessoryShopRequest as ApiUpdateAccessoryShopRequest;
use App\Models\AccessoryShop;
use App\Http\Requests\StoreAccessoryShopRequest;
use App\Http\Requests\UpdateAccessoryShopRequest;

class AccessoryShopController extends Controller
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
    public function store(ApiStoreAccessoryShopRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AccessoryShop $accessoryShop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccessoryShop $accessoryShop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiUpdateAccessoryShopRequest $request, AccessoryShop $accessoryShop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccessoryShop $accessoryShop)
    {
        //
    }
}
