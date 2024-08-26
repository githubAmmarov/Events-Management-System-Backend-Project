<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FoodOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id',
        'order_id',
        'quantity',
    ];

    protected $hidden = [
        'food_id',
        'order_id',
        'created_at',
        'updated_at'
    ];
    protected $table="food_order";

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
    public function order():BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
