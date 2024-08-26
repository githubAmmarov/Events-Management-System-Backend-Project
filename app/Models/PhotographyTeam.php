<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PhotographyTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_id',
        'name',
        'address',
        'cost',
        'phone_number'
    ];

    protected $hidden = [
        'media_id',
        'created_at',
        'updated_at'
    ];
    protected $table="photography_teams";

    /**
    MY PK IS FK WHERE?
    **/

    public function orders():HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
    MY FK BELONGS TO?
    **/
    public function media():BelongsTo
    {
        return $this->belongsTo(Media::class);
    }
}
