<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_role'
    ];

    protected $table="roles";

    /**
    MY PK IS FK WHERE?
     **/

    public function user():HasMany
    {
        return $this->hasMany(User::class);
    }
   
    /**
    MY FK BELONGS TO?
     **/

}
