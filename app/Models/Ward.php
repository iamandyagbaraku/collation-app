<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function localGovernmentArea()
    {
        return $this->belongsTo(LocalGovernmentArea::class);
    }
}
