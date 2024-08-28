<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id',
        'sub_room_id',
        'photography_team_id',
        'invitation_card_id',
        'is_paid',
        'total_cost',
    ];

    protected $table="orders";

    protected $hidden = [
        'event_id',
        'user_id',
        'sub_room_id',
        'photography_team_id',
        'invitation_card_id',
        'created_at',
        'updated_at'
    ];
    /**
    MY PK IS FK WHERE?
     **/

    /**
     MY FK BELONGS TO?
     **/
    public function food():BelongsToMany
    {
        return $this->belongsToMany(Food::class,'food_order','order_id','food_id')->withPivot('quantity');
    }
    public function accessory():BelongsToMany
    {
        return $this->belongsToMany(Accessory::class);
    }
    public function sub_room():BelongsTo
    {
        return $this->belongsTo(SubRoom::class);
    }
    public function photography_team():BelongsTo
    {
        return $this->belongsTo(PhotographyTeam::class);
    }
    public function invitation_card():BelongsTo
    {
        return $this->belongsTo(InvitationCard::class);
    }
    public function event():BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
