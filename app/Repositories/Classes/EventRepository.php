<?php

namespace App\Repositories\Classes;

use App\Http\Responses\Response;
use App\Repositories\baseRepository;
use App\Models\Event;
use Exception;

class EventRepository extends baseRepository
{
    public function __construct(Event $event)
    {
        parent::__construct($event);
    }
    public function index()
    {
        $events = Event::with('event_date','type_of_event','sub_room')->get();
        $message = 'these are all events';
        try {
            return Response::Success($events,$message);
        } catch (Exception $e) {
            $error = "Failed to retrieve events." ;
            return Response::Error($error, $e , 500);
        }
    }
}
