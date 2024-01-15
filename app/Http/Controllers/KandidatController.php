<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kandidat = Kandidat::all();
        return view('kandidat.index', compact('kandidat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kandidat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Kandidat' => 'required',
            'Tanggal_Lahir' => 'date',
            'Partai_Politik' => 'required',
            'Nomor_Urut	' => 'integer',
            'Program_Kerja' => 'required',
        ]);

        Kandidat::create([
            'Nama_Kandidat' => $request->Nama_Kandidat,
            'Tanggal_Lahir' => $request->Tanggal_Lahir,
            'Partai_Politik' => $request->Partai_Politik,
            'Nomor_Urut' => $request->Nomor_Urut,
            'Program_Kerja' => $request->Program_Kerja,
        ]);

        return redirect()->route('kandidat.index')->with('success', 'Berhasil menambah data!');
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
        $kandidat = Kandidat::find($id);
        return view('kandidat.edit', compact('kandidat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = Kandidat::find($id);

        $request->validate([
            'Nama_Kandidat' => 'required',
            'Tanggal_Lahir' => 'date',
            'Partai_Politik' => 'required',
            'Nomor_Urut	' => 'integer',
            'Program_Kerja' => 'required',
        ]);
        $barang->update([
            'Nama_Kandidat' => $request->Nama_Kandidat,
            'Tanggal_Lahir' => $request->Tanggal_Lahir,
            'Partai_Politik' => $request->Partai_Politik,
            'Nomor_Urut' => $request->Nomor_Urut,
            'Program_Kerja' => $request->Program_Kerja,
        ]);

        return redirect()->route('kandidat.index')->with('success', 'Berhasil Mengupdate data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kandidat = Kandidat::find($id);
        if ($kandidat) {
            $kandidat->delete();
            return redirect()->route('kandidat.index')->with('success', 'Berhasil menghapus data.');
        } else {
            return redirect()->route('kandidat.index')->with('error', 'Data tidak ditemukan.');
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $kandidat = Kandidat::where('Nama_Kandidat', 'like', "%$keyword%")
            ->orWhere('Partai_Politik', 'like', "%$keyword%")
            ->orWhere('Nomor_Urut', 'like', "%$keyword%")
            ->orWhere('Program_Kerja', 'like', "%$keyword%")
            ->get();

        return view('kandidat.index', compact('kandidat'));
    }
}
