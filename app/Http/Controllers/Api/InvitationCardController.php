<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\StoreInvitationCardRequest as ApiStoreInvitationCardRequest;
use App\Models\InvitationCard;
use App\Http\Requests\StoreInvitationCardRequest;
use App\Http\Requests\UpdateInvitationCardRequest;

class InvitationCardController extends Controller
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
    public function update(UpdateInvitationCardRequest $request, InvitationCard $invitationCard)
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
