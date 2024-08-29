<?php

namespace App\Repositories\Classes;

use App\Http\Responses\Response;
use App\Repositories\baseRepository;
use App\Models\Reservation;
use Exception;

class ReservationRepository extends baseRepository
{
    public function __construct(Reservation $reservation)
    {
        parent::__construct($reservation);
    }
    public function index()
    {
        $reservations = Reservation::with('sub_room','event_date')->get();
        $message = 'these are all reservations';
        try {
            return Response::Success($reservations,$message);
        } catch (Exception $e) {
            $error = "Failed to retrieve reservations." ;
            return Response::Error($error, $e , 500);
        }
    }
}
