<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalGovernmentArea extends Model
{
    use HasFactory;

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }

    public function units()
    {
        return $this->hasManyThrough(Unit::class, Ward::class);
    }
}
