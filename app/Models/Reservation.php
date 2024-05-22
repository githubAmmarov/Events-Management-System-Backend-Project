<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;


    protected $fillable = [
        'event_date_id',
        'sub_room_id',
    ];

    protected $table="reservations";

    /**
    MY PK IS FK WHERE?
    **/
    /**
    MY FK BELONGS TO?
     **/
    public function event_date():BelongsTo
    {
        return $this->belongsTo(EventDate::class);
    }
    public function sub_room():BelongsTo
    {
        return $this->belongsTo(SubRoom::class);
    }
}
