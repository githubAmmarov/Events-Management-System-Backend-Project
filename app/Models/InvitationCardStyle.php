<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvitationCardStyle extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_id',
        'style',
    ];

    protected $table="invitation_card_styles";

    /**
    MY PK IS FK WHERE?
     **/
    
    public function invitation_card():HasMany
    {
        return $this->hasMany(InvitationCard::class);
    }

    /**
    MY FK BELONGS TO?
    **/
    public function media():BelongsTo
    {
        return $this->belongsTo(Media::class);
    }
}
