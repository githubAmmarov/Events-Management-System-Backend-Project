<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\Attendance;

class AttendanceRepository extends baseRepository
{
    public function __construct(Attendance $attendance)
    {
        parent::__construct($attendance);
    }
}
