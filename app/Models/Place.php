<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_type_id',
        'media_id',
        'name',
        'phone_number',
        'address'
    ];

    protected $hidden = [
        'place_type_id',
        'media_id',
        'created_at',
        'updated_at'
    ];

    protected $table="places";

    /**
    MY PK IS FK WHERE?
     **/

     public function sub_rooms():HasMany
     {
         return $this->hasMany(SubRoom::class);
     }

    /**
    MY FK BELONGS TO?
     **/

    public function place_type():BelongsTo
    {
        return $this->belongsTo(PlaceType::class);
    }
    public function media():BelongsTo
    {
        return $this->belongsTo(Media::class);
    }
}
