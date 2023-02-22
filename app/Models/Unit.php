<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Unit extends Model
{
    use HasFactory;

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    public function localGovernmentArea()
    {
        return $this->hasOneThrough(LocalGovernmentArea::class, Ward::class, 'id', 'id', 'ward_id', 'local_government_area_id');
    }
}
