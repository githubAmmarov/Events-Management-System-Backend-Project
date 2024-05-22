<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
    ];

    protected $table="likes";

    /**
    MY PK IS FK WHERE?
     **/
    /**
    MY FK BELONGS TO?
     **/
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function post():BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
