<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FoodOrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id',
        'order_item_id',
        'quantity',
    ];

    protected $table="food_order_item";

    /**
    MY PK IS FK WHERE?
    **/
    /**
    MY FK BELONGS TO?
    **/
    public function food():BelongsTo
    {
        return $this->belongsTo(Food::class);
    }
    public function order_item():BelongsTo
    {
        return $this->belongsTo(OrderItem::class);
    }
}
