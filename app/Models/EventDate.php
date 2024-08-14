<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EventDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'event_date',
    ];

    protected $table="event_dates";

    protected $hidden = [
        'event_id',
        'created_at',
        'updated_at'
    ];
    /**
    MY PK IS FK WHERE?
     **/
    public function reservation():HasOne
    {
        return $this->hasOne(Event::class);
    }
    /**
    MY FK BELONGS TO?
     **/
    public function event():BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
