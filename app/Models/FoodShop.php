<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FoodShop extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_id',
        'name',
        'address',
        'phone_number',
    ];

    protected $table="food_shops";

    /**
    MY PK IS FK WHERE?
    **/

    public function food_items():HasMany
    {
        return $this->hasMany(FoodOrderItem::class);
    }

    /**
    MY FK BELONGS TO?
    **/
    public function media():BelongsTo
    {
        return $this->belongsTo(Media::class);
    }
}
