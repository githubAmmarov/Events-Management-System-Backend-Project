<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Accessory extends Model
{
    use HasFactory;

    protected $fillable = [
        'accessory_type_id',
        'media_id',
        'name',
        'price',
    ];

    protected $hidden = [
        'created_at',
        'accessory_type_id',
        'media_id',
        'updated_at'
    ];
    protected $table="accessories";

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
    public function accessory_type():BelongsTo
    {
        return $this->belongsTo(AccessoryType::class);
    }
    // public function accessory_shop():BelongsToMany
    // {
    //     return $this->belongsToMany(AccessoryShop::class);
    // }
    public function order_item():BelongsToMany
    {
        return $this->belongsToMany(OrderItem::class);
    }
}
