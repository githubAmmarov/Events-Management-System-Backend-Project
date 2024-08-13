<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AccessoryShop extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_id',
        'name',
        'address',
        'phone_number'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $table="accessory_shops";

    /**
    MY PK IS FK WHERE?
    **/
    /**
    MY FK BELONGS TO?
    **/
    public function media():BelongsTo
    {
        return $this->belongsTo(Media::class);
    }
    public function accessory():BelongsToMany
    {
        return $this->belongsToMany(Accessory::class);
    }
}
