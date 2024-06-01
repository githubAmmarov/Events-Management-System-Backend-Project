<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreMediaRequest as ApiStoreMediaRequest;
use App\Http\Requests\Api\UpdateMediaRequest as ApiUpdateMediaRequest;
use App\Models\Media;
use App\Traits\ApiTraits;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;

class MediaController extends Controller
{
    use ApiTraits;
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
    public function store(ApiStoreMediaRequest $request)
    {
        //
        $this->saveImage($request->image);
        return 'success'.'Image uploaded successfully.';
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiUpdateMediaRequest $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        //
    }
}
