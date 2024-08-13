<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InvitationCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'invitation_card_style_id',
        'description',
    ];

    protected $table="invitation_cards";

    /**
    MY PK IS FK WHERE?
    **/
    public function order_item():HasOne
    {
        return $this->hasOne(OrderItem::class);
    }

    /**
    MY FK BELONGS TO?
    **/
    public function event():BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
    public function style():BelongsTo
    {
        return $this->belongsTo(InvitationCardStyle::class);
    }
}
