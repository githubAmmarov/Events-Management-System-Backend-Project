<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\Reservation;

class ReservationRepository extends baseRepository
{
    public function __construct(Reservation $reservation)
    {
        parent::__construct($reservation);
    }
}
