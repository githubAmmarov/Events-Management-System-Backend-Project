<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorePhotographyTeamRequest as ApiStorePhotographyTeamRequest;
use App\Http\Requests\Api\UpdatePhotographyTeamRequest as ApiUpdatePhotographyTeamRequest;
use App\Models\PhotographyTeam;
use App\Http\Requests\StorePhotographyTeamRequest;
use App\Http\Requests\UpdatePhotographyTeamRequest;
use App\Http\Responses\Response;

class PhotographyTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photographyTeam = [];
        try {
        $photographyTeam = PhotographyTeam::query()->with('media')->get();
        $message = 'These are all photographyTeams';

        return Response::Success($photographyTeam,$message,200);
        } catch(\Exception $e) {
            $message = $e->getMessage();
        return Response::Error($message, $e->getCode(),500);
        }
    }

    public function indexforID($id)
    {
        $photographyTeam = [];
        try {
            $photographyTeam = PhotographyTeam::query()->with('media')->findOrFail($id);
            $message = "This is $id th photographyTeam";
        return Response::Success($photographyTeam,$message,200);
        } catch (\Throwable $th) {
            $message = $th->getMessage();
        return Response::Error($message, $th->getCode(),500);
        }
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
