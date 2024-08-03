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
use Exception;
use Illuminate\Support\Facades\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubRoom $subRoom, $month, $year)
    {
        $placename = $subRoom->place->name;
        $reservationsByDate = [];
        try{
            $reservations = Reservation::query()
            ->where('sub_room_id', $subRoom->id)
            ->with('event_date')
            ->get();
            
            if ($month && $year) {
                $startDate = Carbon::create($year,$month,1)->startOfMonth();
                $endDate = Carbon::create($year,$month,1)->endOfMonth();
                foreach($reservations as $reservation)
                {
                    if ($endDate >= $reservation->event_date->event_date && $reservation->event_date->event_date >= $startDate)
                    array_push($reservationsByDate,$reservation);
            }
            
            $message="these are all reservations for $placename in month $month year $year ";
            return Response::Success($reservationsByDate, $message, 200);
        }
        }catch(Exception $th){
            $error = $th->getMessage();
            return Response::Error($th,$error,500);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ||==========================================================================================||
        // ||there is a condition that the (reservation->subroom && reservation->event_date->eventdate)||
        // ||mustn't be duplicated in 2 rows in reservation table                                      ||
        // ||==========================================================================================||
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
