<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\EventType;

class EventTypeRepository extends baseRepository
{
    public function __construct(EventType $eventType)
    {
        parent::__construct($eventType);
    }
}
