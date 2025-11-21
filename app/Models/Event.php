<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'club_id',
        'host_id',
        'coordinator_id',
        'location_id',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function host()
    {
        return $this->belongsTo(User::class, 'host_id');
    }

    public function coordinator()
    {
        return $this->belongsTo(User::class, 'coordinator_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
