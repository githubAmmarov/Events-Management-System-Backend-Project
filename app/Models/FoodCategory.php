<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FoodCategory extends Model
{
    use HasFactory;


    protected $fillable = [
        'category',
    ];

    protected $table="food_categories";

    /**
    MY PK IS FK WHERE?
    **/

    public function foods():HasMany
    {
        return $this->hasMany(Food::class);
    }

    /**
    MY FK BELONGS TO?
    **/
}
