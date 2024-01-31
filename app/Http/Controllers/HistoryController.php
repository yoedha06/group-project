<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\Pemilih;
use Illuminate\Http\Request;

class HistoryController extends Controller
{

    public function index()
    {
        $history = history::all();
        return view('history.index', compact('history'));
    }

    public function create()
    {
        return view('history.create');

    }

    public function store(Request $request)
    {
        history::create($request->all());
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
