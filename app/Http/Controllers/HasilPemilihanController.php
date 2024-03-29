<?php

namespace App\Http\Controllers;

use App\Models\HasilPemilihan;
use App\Http\Controllers\Controller;
use App\Models\Kandidat;
use App\Models\Pemilih;
use Illuminate\Http\Request;

class HasilPemilihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hasilpemilihan = HasilPemilihan::paginate(5);
        return view('HasilPemilih.index', compact('hasilpemilihan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemilih = Pemilih::all();
        $kandidat = Kandidat::all();
        return view('HasilPemilih.create', compact('pemilih', 'kandidat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'Id_HasilPemilihan' => 'required',
            'Id_Pemilih' => 'required',
            'Id_Kandidat' => 'required',
        ]);

        $pemilih = Pemilih::find($request->Id_Pemilih);
        $kandidat = Kandidat::find($request->Id_Kandidat);

        HasilPemilihan::create([
            // 'Id_HasilPemilihan' => $request->Id_HasilPemilihan,
            'Id_Pemilih' => $pemilih->Id_Pemilih,
            'Id_Kandidat' => $kandidat->Id_Kandidat,
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

        $pemilih = Pemilih::all();
        $kandidat = kandidat::all();
        return view('HasilPemilih.edit', compact('hasilpemilihan', 'pemilih', 'kandidat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $hasilpemilihan = HasilPemilihan::find($id);

        $request->validate([
            // 'Id_HasilPemilihan' => 'required',
            'Id_Pemilih' => 'required',
            'Id_Kandidat' => 'required',
        ]);

        $hasilpemilihan->update([
            // 'Id_HasilPemilihan' => $request->Id_HasilPemilihan,
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

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $hasilpemilihan = HasilPemilihan::whereHas('pemilih', function ($query) use ($keyword) {
            $query->where('nama_pemilih', 'like', "%$keyword%");
        })
            ->orWhereHas('kandidat', function ($query) use ($keyword) {
                $query->where('Nama_Kandidat', 'like', "%$keyword%");
            })
            ->paginate(5);

        return view('hasilpemilih.index', compact('hasilpemilihan'));
    }
}
