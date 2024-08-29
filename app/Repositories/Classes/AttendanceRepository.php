<?php

namespace App\Repositories\Classes;

use App\Http\Responses\Response;
use App\Repositories\baseRepository;
use App\Models\Attendance;
use Exception;

class AttendanceRepository extends baseRepository
{
    public function __construct(Attendance $attendance)
    {
        parent::__construct($attendance);
    }
    public function index()
    {
        $attendeese = Attendance::with('event')->get();
        $message = 'these are all attendeese with their events';
        try {
            return Response::Success($attendeese,$message);
        } catch (Exception $e) {
            $error = "Failed to retrieve attendeese." ;
            return Response::Error($error, $e , 500);
        }
    }
}
