<?php

namespace App\Http\Controllers;

use App\Models\HasilPemilihan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HasilPemilihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hasilpemilihan = HasilPemilihan::all();
        return view('HasilPemilih.index', compact('hasilpemilihan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('HasilPemilih.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Id_HasilPemilihan' => 'required',
            'Id_Pemilih' => 'required',
            'Id_Kandidat' => 'required',
        ]);

        HasilPemilihan::create([
            'Id_HasilPemilihan' => $request->Id_HasilPemilihan,
            'Id_Pemilih' => $request->Id_Pemilih,
            'Id_Kandidat' => $request->Id_Kandidat,
        ]);
        return redirect()->route('hasilpemilihan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(HasilPemilihan $hasilPemilihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $hasilpemilihan = HasilPemilihan::find($id);
        return view('HasilPemilih.edit', compact('hasilpemilihan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $hasilpemilihan = HasilPemilihan::find($id);

        $request->validate([
            'Id_HasilPemilihan' => 'required',
            'Id_Pemilih' => 'required',
            'Id_Kandidat' => 'required',
        ]);

        $hasilpemilihan->update([
            'Id_HasilPemilihan' => $request->Id_HasilPemilihan,
            'Id_Pemilih' => $request->Id_Pemilih,
            'Id_Kandidat' => $request->Id_Kandidat,
        ]);
        return redirect()->route('hasilpemilihan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $hasilPemilihan = HasilPemilihan::find($id);
        $hasilPemilihan->delete();
        return redirect()->route('hasilpemilihan.index');
    }
}
