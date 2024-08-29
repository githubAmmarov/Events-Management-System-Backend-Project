<?php

namespace App\Http\Controllers\Api\Event;

use App\Http\Controllers\Controller;
use App\Repositories\Classes\EventTypeRepository;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    // protected $eventTypeService;
    protected $eventTypeRepository;

    public function __construct(EventTypeRepository $eventTypeRepository)
    {
        // $this->eventTypeService = $eventTypeService;
        $this->eventTypeRepository = $eventTypeRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->eventTypeRepository->index();
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
