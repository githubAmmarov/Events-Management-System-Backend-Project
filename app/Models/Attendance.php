<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'name',
        'email',
        'phone_number',
        'priority'
    ];

    protected $hidden = [
        'event_id',
        'created_at',
        'updated_at'
    ];
    protected $table="attendances";

    /**
    MY PK IS FK WHERE?
     */

    /**
    MY FK BELONGS TO?
     **/
    public function event():BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
