<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'event_date',
    ];

    protected $table="event_dates";

    /**
    MY PK IS FK WHERE?
     **/
    /**
    MY FK BELONGS TO?
     **/
    public function event():BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
