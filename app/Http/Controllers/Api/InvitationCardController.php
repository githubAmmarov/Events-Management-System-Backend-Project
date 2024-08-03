<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreInvitationCardRequest as ApiStoreInvitationCardRequest;
use App\Http\Requests\Api\UpdateInvitationCardRequest as ApiUpdateInvitationCardRequest;
use App\Models\InvitationCard;
use App\Http\Responses\Response;
use App\Models\InvitationCardStyle;

class InvitationCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $styles = [];
        try {
        $message = 'these are all styles';
        $styles = InvitationCardStyle::
        with('media')
        ->get();
        return Response::Success($styles,$message,200);

        } catch (\Exception $e) {
            $message = $e->getMessage();
            return Response::Error($e->getMessage(),$message,400);
        }
        // return InvitationCardStyle::all();
    }
    public function styleItem($id)
    {
        //
        $style = [];
        try {
            $style = InvitationCardStyle::query()
            ->with('media')
            ->findOrFail($id);
            $message = "this is $style->style style";
        return Response::Success($style,$message,200);

        } catch (\Exception $e) {
            $message = $e->getMessage();
            return Response::Error($e->getMessage(),$message,400);
        }
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
    public function store(ApiStoreInvitationCardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InvitationCard $invitationCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvitationCard $invitationCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiUpdateInvitationCardRequest $request, InvitationCard $invitationCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvitationCard $invitationCard)
    {
        //
    }
}
