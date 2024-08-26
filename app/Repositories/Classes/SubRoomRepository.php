<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\SubRoom;

class SubRoomRepository extends baseRepository
{
    public function __construct(SubRoom $subRoom)
    {
        parent::__construct($subRoom);
    }
}
