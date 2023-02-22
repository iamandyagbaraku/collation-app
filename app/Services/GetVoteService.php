<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class GetVoteService
{

    public function totalVotesByLocalGovernment()
    {
        return DB::table('units')
            ->join('wards', 'units.ward_id', '=', 'wards.id')
            ->join('local_government_areas', 'wards.local_government_area_id', '=', 'local_government_areas.id')
            ->select('wards.local_government_area_id', 'local_government_areas.name', DB::raw('SUM(units.vote) as total_votes'))
            ->groupBy('wards.local_government_area_id', 'local_government_areas.name')
            ->pluck('name', 'total_votes');
    }

    public function totalVotesByWard()
    {
        return
            DB::table('units')
            ->join('wards', 'units.ward_id', '=', 'wards.id')
            ->select('wards.id', 'wards.name', DB::raw('SUM(units.vote) as total_votes'))
            ->groupBy('wards.id', 'wards.name')
            ->pluck('total_votes', 'name');
    }
}
