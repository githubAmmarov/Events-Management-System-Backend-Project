<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AccessoryOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'accessory_id',
        'order_id',
    ];

    protected $table="accessory_order";

    protected $hidden = [
        'accessory_id',
        'order_id',
        'created_at',
        'updated_at'
    ];
    /**
    MY PK IS FK WHERE?
    **/
    /**
    MY FK BELONGS TO?
    **/
    public function order():BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    public function accessory():BelongsTo
    {
        return $this->belongsTo(Accessory::class);
    }
}
