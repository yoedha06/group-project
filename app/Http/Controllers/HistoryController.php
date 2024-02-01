<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\Pemilih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{

    public function index()
    {
        $history = DB::table('histori')->orderBy('created_at', 'desc')->get();

        if (empty($history)) {
            return redirect()->route('history');
        }

        // dd($history); // Debugging statement
        $end = History::get();
        return view('history.index', compact('history', 'end'));
    }



    public function map()
    {
        $history = DB::table('histori')->get();
        return view('history.map', compact('history'));
    }


    public function create()
    {
        return view('history.create');
    }

    public function store(Request $request)
    {
        history::create($request->all());
        // dd($request->all());
        return redirect()->route('history.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(Request $request, history $history)
    {
        return view('history.edit', compact('history'));
    }

    public function update(Request $request, history $history)
    {
        $validated = $request->validate([
            'latlng' => 'required',
            'bounds' => 'required',
            'accuracy' => 'required',
            'altitude' => 'required',
            'altitude_acuracy' => 'required',
            'heading' => 'required',
            'speeds' => 'required',
        ]);

        $history->update($validated);

        session()->flash('berhasil', "updated successfully!");

        return to_route('history.index');
    }

    public function destroy(history $history)
    {
        $history = history::findOrFail($history->id);
        $history->delete();

        return redirect()->route('history.index')->with('success', 'Pemilih berhasil dihapus!');
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
