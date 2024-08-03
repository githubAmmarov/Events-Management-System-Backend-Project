<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Http\Requests\Api\StoreReservationRequest;
use App\Http\Requests\Api\UpdateReservationRequest;
use App\Http\Responses\Response;
use App\Models\EventDate;
use App\Models\SubRoom;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubRoom $subRoom, $month, $year)
    {
        // $reservations = Reservation::query()
        // ->where('sub_room_id', $subRoom->id)
        // ->with('event_date')
        // ->get();

        if ($month && $year) {
            $startDate = Carbon::create($year,$month,1)->startOfMonth();
            $endDate = Carbon::create($year,$month,1)->endOfMonth();

            $reservations = EventDate::query()->whereBetween('event_date',[$startDate, $endDate])
            // ->with('event_date')
            ->get();

            $message="these are all reservations for $subRoom->id th";
            return Response::Success($reservations, $message, 200);
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
    public function store(StoreReservationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
