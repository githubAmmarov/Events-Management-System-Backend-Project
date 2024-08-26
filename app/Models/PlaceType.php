<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlaceType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $table="place_types";

    protected $hidden = ['created_at','updated_at'];


    /**
    MY PK IS FK WHERE?
     **/
    public function places():HasMany
    {
        return $this->hasMany(Place::class);
    }

    /**
    MY FK BELONGS TO?
     **/
}
