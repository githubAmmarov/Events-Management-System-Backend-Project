<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlaceRoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $table="place_room_types";

    protected $hidden = ['created_at','updated_at'];


    /**
    MY PK IS FK WHERE?
     **/

     public function sub_rooms():HasMany
    {
        return $this->hasMany(SubRoom::class);
    }
    public function places():HasMany
    {
        return $this->hasMany(Place::class);
    }

    /**
    MY FK BELONGS TO?
     **/
}
