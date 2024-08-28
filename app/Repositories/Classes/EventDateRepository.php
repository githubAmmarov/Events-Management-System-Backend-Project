<?php

namespace App\Repositories\Classes;

use App\Http\Responses\Response;
use App\Repositories\baseRepository;
use App\Models\EventDate;
use Exception;

class EventDateRepository extends baseRepository
{
    public function __construct(EventDate $eventDate)
    {
        parent::__construct($eventDate);
    }
    public function index()
    {
        $eventDates = EventDate::with('event')->get();
        $message = 'these are all events dates';
        try {
            return Response::Success($eventDates,$message);
        } catch (Exception $e) {
            $error = "Failed to retrieve accessories." ;
            return Response::Error($error, $e , 500);
        }
    }
}
