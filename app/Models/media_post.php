<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class media_post extends Model
{
    use HasFactory;

    protected $fillible =
    [
        'media_id',
        'post_id'
    ];

    protected $table = 'media_post';

    public function post():BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function media():BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
