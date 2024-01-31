<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\Pemilih;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $history = history::all();
        return view('history.index', compact('history'));
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

    public function HistoryMap()
    {
        $history = history::all();

        if ($history->isEmpty()) {
            // Handle the case when $history is empty, maybe log a message or redirect
            return redirect()->route('history'); // Replace 'some.route' with an actual route
        }

        return view('history.map', compact('history'));
    }
}
