<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LocalGovernmentArea;
use App\Services\GetVoteService;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localGovernmentAreas = LocalGovernmentArea::with('wards', 'units')->get();

        $totalVotesByLocalGovernment = (new GetVoteService())->totalVotesByLocalGovernment();

        $totalVotesByWard = (new GetVoteService())->totalVotesByWard();

        $wards = Ward::with('units')->get();

        return view('website.index', compact('localGovernmentAreas', 'wards', 'totalVotesByLocalGovernment', 'totalVotesByWard'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LocalGovernmentArea  $localGovernmentArea
     * @return \Illuminate\Http\Response
     */
    public function show(LocalGovernmentArea $localGovernmentArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LocalGovernmentArea  $localGovernmentArea
     * @return \Illuminate\Http\Response
     */
    public function edit(LocalGovernmentArea $localGovernmentArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LocalGovernmentArea  $localGovernmentArea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LocalGovernmentArea $localGovernmentArea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocalGovernmentArea  $localGovernmentArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocalGovernmentArea $localGovernmentArea)
    {
        //
    }
}
