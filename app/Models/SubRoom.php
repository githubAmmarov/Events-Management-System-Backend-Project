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
        'media_id',
        'name',
        'capacity',
        'cost'
    ];

    protected $hidden = [
        'place_id',
        'media_id',
        'created_at',
        'updated_at'
    ];

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
    public function orders():HasMany
    {
        return $this->hasMany(Order::class);
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
}
