<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        "user_id"
    ];


    /**
     * Get the phone associated with the user.
     */
    public function user()
    {
        return $this->belongsToMany(User::class,"associate_user_event");
    }
}
