<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FoodItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_id',
        'food_id',
        'food_shop_id',
        'price',
    ];

    protected $table="food_items";

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
    public function food():BelongsTo
    {
        return $this->belongsTo(Food::class);
    }
    public function food_shop():BelongsTo
    {
        return $this->belongsTo(FoodShop::class);
    }
    public function order_item():BelongsToMany
    {
        return $this->belongsToMany(OrderItem::class);
    }
}
