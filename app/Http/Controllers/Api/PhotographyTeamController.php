<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorePhotographyTeamRequest as ApiStorePhotographyTeamRequest;
use App\Http\Requests\Api\UpdatePhotographyTeamRequest as ApiUpdatePhotographyTeamRequest;
use App\Models\PhotographyTeam;
use App\Http\Requests\StorePhotographyTeamRequest;
use App\Http\Requests\UpdatePhotographyTeamRequest;

class PhotographyTeamController extends Controller
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
    public function store(ApiStorePhotographyTeamRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PhotographyTeam $photographyTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhotographyTeam $photographyTeam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiUpdatePhotographyTeamRequest $request, PhotographyTeam $photographyTeam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotographyTeam $photographyTeam)
    {
        //
    }
}
