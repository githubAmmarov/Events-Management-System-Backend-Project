<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventType extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'type'
    ];

    protected $table="event_types";

    /**
    MY PK IS FK WHERE?
     **/
    public function events():HasMany
    {
        return $this->hasMany(Event::class);
    }
    /**
    MY FK BELONGS TO?
     **/
}
