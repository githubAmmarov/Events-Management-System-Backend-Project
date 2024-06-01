<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_url'
    ];

    protected $hidden = ['created_at','updated_at'];

    protected $table="media";

    /**
    MY PK IS FK WHERE?
     **/
    
    public function user():HasOne
    {
        return $this->hasOne(User::class);
    }
     public function photography_team():HasOne
    {
        return $this->hasOne(PhotographyTeam::class);
    }
    public function accessory():HasOne
    {
        return $this->hasOne(Accessory::class);
    }
    public function accessory_shop():HasOne
    {
        return $this->hasOne(AccessoryShop::class);
    }
    public function food():HasOne
    {
        return $this->hasOne(Food::class);
    }
    public function food_item():HasOne
    {
        return $this->hasOne(FoodItem::class);
    }
    public function sub_room():HasOne
    {
        return $this->hasOne(SubRoom::class);
    }
    public function place():HasOne
    {
        return $this->hasOne(Place::class);
    }
    public function invitation_card_style():HasOne
    {
        return $this->hasOne(InvitationCardStyle::class);
    }

    /**
     MY FK BELONGS TO?
     **/

    public function posts():BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
