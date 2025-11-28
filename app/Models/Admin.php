<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $timestamps = false;

    public static function isAdmin($id)
    {
        return static::where("id", $id)->exists();
    }
}
