<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'password',
        'location_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'clubs_member_users');
    }

    public function blockedClubs()
    {
        return $this->belongsToMany(Club::class, 'user_blocked_clubs');
    }

    public function joinRequestedClubs()
    {
        return $this->belongsToMany(Club::class, 'club_join_request_users');
    }

    public function blockedByClubs()
    {
        return $this->belongsToMany(Club::class, 'club_blocked_users');
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function hostedEvents()
    {
        return $this->hasMany(Event::class, 'host_id');
    }

    public function coordinatedEvents()
    {
        return $this->hasMany(Event::class, 'coordinator_id');
    }
}
