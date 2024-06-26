<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id',
        'is_paid',
    ];

    protected $table="orders";

    /**
    MY PK IS FK WHERE?
     **/

    public function order_items():HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
    
    /**
    MY FK BELONGS TO?
     **/
    public function event():BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
