<?php

namespace App\Repositories\Classes;

use App\Http\Responses\Response;
use App\Repositories\baseRepository;
use App\Models\SubRoom;
use Exception;

class SubRoomRepository extends baseRepository
{
    public function __construct(SubRoom $subRoom)
    {
        parent::__construct($subRoom);
    }
    public function index()
    {
        $subRooms = SubRoom::with('place','media')->get();
        $message = 'these are all sub Rooms';
        try {
            return Response::Success($subRooms,$message);
        } catch (Exception $e) {
            $error = "Failed to retrieve sub Rooms." ;
            return Response::Error($error, $e , 500);
        }
    }
}
