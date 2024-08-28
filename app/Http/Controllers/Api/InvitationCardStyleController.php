<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Classes\InvitationCardStyleRepository;
use Illuminate\Http\Request;

class InvitationCardStyleController extends Controller
{
    protected $invitationCardStyleService;
    protected $invitationCardStyleRepository;

    public function __construct(InvitationCardStyleRepository $invitationCardStyleRepository)
    {
        // $this->invitationCardService = $invitationCardService;
        $this->invitationCardStyleRepository = $invitationCardStyleRepository;
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
        return $this->invitationCardStyleRepository->index(); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
