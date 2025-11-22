<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $timestamp = false;

    public function isAdmin($id)
    {
        return $this->where("id", $id)->exists();
    }
}
