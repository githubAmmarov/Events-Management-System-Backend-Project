<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_id',
        'place_room_type_id',
        'media_id',
        'name',
        'capacity',
        'cost'
    ];

    protected $hidden = ['created_at','updated_at'];

    protected $table="sub_rooms";

    /**
    MY PK IS FK WHERE?
     **/

    public function reservations():HasMany
    {
        return $this->hasMany(Reservation::class);
    }
    public function events():HasMany
    {
        return $this->hasMany(Event::class);
    }
    public function order_items():HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
    MY FK BELONGS TO?
     **/

    public function media():BelongsTo
    {
        return $this->belongsTo(Media::class);
    }
    public function place():BelongsTo
    {
        return $this->belongsTo(Place::class);
    }
    public function place_room_type():BelongsTo
    {
        return $this->belongsTo(PlaceRoomType::class);
    }
}
