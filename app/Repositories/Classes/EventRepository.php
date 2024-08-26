<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\Event;

class EventRepository extends baseRepository
{
    public function __construct(Event $event)
    {
        parent::__construct($event);
    }
}
