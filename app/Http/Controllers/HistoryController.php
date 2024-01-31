<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\Pemilih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $history = DB::table('histori')->get();

        if (empty($history)) {
            return redirect()->route('history');
        }

        // dd($history); // Debugging statement

        $start = Pemilih::first()->koordinat;
        $end = History::first()->latlng;

        return view('history.index', compact('history', 'start', 'end'));
    }



    public function map()
    {
        $history = DB::table('histori')->get();
        // dd($history);

        return view('history.map', compact('history'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('history.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        history::create($request->all());
        // dd($request->all());
        return redirect()->route('history.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(history $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, history $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(history $history)
    {
        //
    }

    // public function HistoryMap()
    // {
    //     $history = History::all();

    //     if ($history->isEmpty()) {
    //         return redirect()->route('history');
    //     }

    //     $start = Pemilih::first()->koordinat;
    //     $end = History::first()->latlng;
    //     // dd($start, $end, $history);

    //     return view('history.index', compact('history', 'start', 'end'));
    // }
}
