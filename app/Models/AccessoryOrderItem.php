<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AccessoryOrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'accessory_id',
        'order_item_id',
    ];

    protected $table="accessory_order_item";

    protected $hidden = [
        'accessory_id',
        'order_item_id',
        'created_at',
        'updated_at'
    ];
    /**
    MY PK IS FK WHERE?
    **/
    /**
    MY FK BELONGS TO?
    **/
    public function order_item():BelongsTo
    {
        return $this->belongsTo(OrderItem::class);
    }
    public function accessory():BelongsTo
    {
        return $this->belongsTo(Accessory::class);
    }
}
