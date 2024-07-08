<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'is_public',
    ];

    protected $table="posts";

    /**
    MY PK IS FK WHERE?
    **/

    public function likes():HasMany
    {
        return $this->hasMany(Like::class);
    }

    /**
    MY FK BELONGS TO?
    **/

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function media():BelongsTo
    {
        return $this->belongsTo(Media::class);
    }
}
