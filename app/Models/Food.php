<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_id',
        'food_category_id',
        'name',
    ];

    protected $table="foods";

    /**
    MY PK IS FK WHERE?
    **/

    public function food_items():HasMany
    {
        return $this->hasMany(FoodItem::class);
    }
    
    /**
     MY FK BELONGS TO?
     **/
    public function media():BelongsTo
    {
        return $this->belongsTo(Media::class);
    }
    public function food_category():BelongsTo
    {
        return $this->belongsTo(FoodCategory::class);
    }
}
