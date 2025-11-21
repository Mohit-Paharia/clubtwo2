<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location_id',
    ];

    public function members()
    {
        return $this->belongsToMany(User::class, 'clubs_member_users');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    public function blockedUsers()
    {
        return $this->belongsToMany(User::class, 'club_blocked_users');
    }

    public function joinRequests()
    {
        return $this->belongsToMany(User::class, 'club_join_request_users');
    }


    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
