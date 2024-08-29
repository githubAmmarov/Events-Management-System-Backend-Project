<?php

namespace App\Http\Controllers\Api\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreEventDateRequest as ApiStoreEventDateRequest;
use App\Http\Requests\Api\UpdateEventDateRequest as ApiUpdateEventDateRequest;
use App\Models\EventDate;
use App\Repositories\Classes\EventDateRepository;

class EventDateController extends Controller
{
    // protected $eventTypeService;
    protected $eventDateRepository;

    public function __construct(EventDateRepository $eventDateRepository)
    {
        // $this->eventTypeService = $eventTypeService;
        $this->eventDateRepository = $eventDateRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->eventDateRepository->index();
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
    public function store(ApiStoreEventDateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EventDate $eventDate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventDate $eventDate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiUpdateEventDateRequest $request, EventDate $eventDate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventDate $eventDate)
    {
        //
    }
}
