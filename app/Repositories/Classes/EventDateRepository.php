<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\EventDate;

class EventDateRepository extends baseRepository
{
    public function __construct(EventDate $eventDate)
    {
        parent::__construct($eventDate);
    }
}
