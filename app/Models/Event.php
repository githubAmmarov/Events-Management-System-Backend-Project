<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_type_id',
        'sub_room_id',
        'description',
        'event_time',
        'num_of_guests',
        'contact_information',
        'is_private',
        'planner_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $table="events";

    /**
    MY PK IS FK WHERE?
     **/
    public function attendances():HasMany
    {
        return $this->hasMany(Attendance::class);
    }
    public function invitation_card():HasOne
    {
        return $this->hasOne(InvitationCard::class);
    }
    public function order():HasOne
    {
        return $this->hasOne(Order::class);
    }
    public function event_date():HasOne
    {
        return $this->hasOne(EventDate::class);
    }

    /**
    MY FK BELONGS TO?
     **/

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function type_of_event():BelongsTo
    {
        return $this->belongsTo(EventType::class, 'event_type_id');
    }
    public function sub_room():BelongsTo
    {
        return $this->belongsTo(SubRoom::class);
    }
}
