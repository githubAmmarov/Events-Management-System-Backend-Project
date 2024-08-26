<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_id',
        'food_category_id',
        'name',
        'price',
        'description'
    ];

    protected $hidden = [
        'media_id',
        'food_category_id',
        'created_at',
        'updated_at'
    ];

    protected $table="food";

    /**
    MY PK IS FK WHERE?
    **/
    public function orders():BelongsToMany
    {
        return $this->belongsToMany(Order::class);
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
