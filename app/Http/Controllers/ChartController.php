<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyUsersChart as ChartsMonthlyUsersChart;
use Illuminate\Http\Request;
use App\Models\Kandidat;
use App\Charts\KandidatChart;
class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChartsMonthlyUsersChart $chart)
    {
        return view('hasilpemilih.grafik', ['chart' => $chart->build()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
