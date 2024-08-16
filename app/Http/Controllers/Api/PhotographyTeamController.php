<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorePhotographyTeamRequest as ApiStorePhotographyTeamRequest;
use App\Http\Requests\Api\UpdatePhotographyTeamRequest as ApiUpdatePhotographyTeamRequest;
use App\Models\PhotographyTeam;
use App\Http\Responses\Response;
use App\Models\Media;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
{
    $validateData = $request->validated();


    return DB::transaction(function () use (& $validateData, $request) {
        $media = null;

        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $mediaPath = $file->storeAs('PhotographTeams', $fileName, 'public');

            $media = Media::create([
                'media_url' => 'storage/' . $mediaPath
            ]);
        }

        $PhotographyTeam = PhotographyTeam::create([
            'media_id' => $media ? $media->id : null,
            'name' => $validateData['name'],
            'address' => $validateData['address'],
            'cost' => $validateData['cost'],
            'phone_number' => $validateData['phone_number']
        ]);

        $message = 'PhotographyTeam created successfully';

        return response()->json([
            'message' => $message,
            'PhotographyTeam_data' => $PhotographyTeam,
            'image_url' => $media ? url($media->media_url) : null
        ], 201);
    });
    }
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
    public function destroy($id)
    {
        $PhotographyTeam = PhotographyTeam::findOrFail($id);
        if ($PhotographyTeam->media) {
            Storage::disk('public')->delete(str_replace('storage/', '', $PhotographyTeam->media->media_url));
            $PhotographyTeam->media->delete();
        }
        $PhotographyTeam->delete();
        $message = 'PhotographyTeam deleted successfully';
        return response()->json([
            'message' => $message
        ], 200);
    }
}

