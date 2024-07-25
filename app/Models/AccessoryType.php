<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AccessoryType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $table="accessory_types";

    /**
    MY PK IS FK WHERE?
     **/

    public function accessories():HasMany
    {
        return $this->hasMany(Accessory::class);
    }

    /**
    MY FK BELONGS TO?
     **/
}
