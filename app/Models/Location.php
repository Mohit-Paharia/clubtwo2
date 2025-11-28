<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'city',
        'state',
        'country',
    ];

    public static function id(string $city, string $state, string $country)
    {
        $location =  static::where('city', $city)
                    ->where('state', $state)
                    ->where('country', $country)
                    ->first();
        
        if ($location) {
            return $location->id;
        }
    
        return static::create([
            'city' => $city,
            'state' => $state,
            'country' => $country
        ])->id;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function clubs()
    {
        return $this->hasMany(Club::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
