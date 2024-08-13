<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'sub_room_id',
        'photography_team_id',
        'invitation_card_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $table="order_items";

    /**
    MY PK IS FK WHERE?
    **/
    /**
    MY FK BELONGS TO?
    **/

    public function food():BelongsToMany
    {
        return $this->belongsToMany(Food::class);
    }
    public function accessory():BelongsToMany
    {
        return $this->belongsToMany(Accessory::class);
    }
    public function sub_room():BelongsTo
    {
        return $this->belongsTo(SubRoom::class);
    }
    public function order():BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    public function photography_team():BelongsTo
    {
        return $this->belongsTo(PhotographyTeam::class);
    }
    public function invitaion_card():BelongsTo
    {
        return $this->belongsTo(InvitationCard::class);
    }

}
