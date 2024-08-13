<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'is_public',
        'image'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
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
    public function media():BelongsToMany
    {
        return $this->belongsToMany(Media::class, 'media_post','post_id','media_id');
    }
}
