<?php

namespace App\Http\Controllers;

use App\Models\Pemilih;
use Illuminate\Http\Request;

class PemilihController extends Controller
{
    public function tampil()
    {
        return view('dashboard');
    }

    public function index()
    {
        $pemilih = Pemilih::all();
        return view('pemilih.index', compact('pemilih'));
    }

    public function create()
    {
        return view('pemilih.tambah');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'nama_pemilih' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_ktp' => 'required|numeric|digits:16|unique:pemilih',
            'status_pemilihan' => 'required',
        ]);

        $pemilih = [
            'nama_pemilih' => $request->input('nama_pemilih'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'alamat' => $request->input('alamat'),
            'no_ktp' => $request->input('no_ktp'),
            'status_pemilihan' => $request->input('status_pemilihan'),

        ];
        Pemilih::create($pemilih);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pemilih.index')->with('success', 'pemilih berhasil ditambahkan.');
    }

    public function edit($Id_Pemilih)
    {
        $pemilih = Pemilih::findOrFail($Id_Pemilih);
        return view('pemilih.edit', compact('pemilih'));
    }

    public function update(Request $request, $Id_Pemilih)
    {
        $request->validate([
            'nama_pemilih' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_ktp' => 'required|numeric|digits:16', 
            'status_pemilihan' => 'required',
        ]);

        $pemilih = Pemilih::findOrFail($Id_Pemilih);

        $pemilih->update([
            'nama_pemilih' => $request->nama_pemilih,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'status_pemilihan' => $request->status_pemilihan,
        ]);

        return redirect()->route('pemilih.index')->with('success', 'pemilih berhasil diperbarui.');
    }

    public function delete($Id_Pemilih)
    {
        $pemilih = Pemilih::findOrFail($Id_Pemilih);
        $pemilih->delete();

        return redirect()->route('pemilih.index')->with('success', 'Pemilih berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $pemilih = Pemilih::where('nama_pemilih', 'like', "%$keyword%")
            ->orWhere('alamat', 'like', "%$keyword%")
            ->orWhere('no_ktp', 'like', "%$keyword%")
            ->orWhere('status_pemilihan', 'like', "%$keyword%")
            ->get();

        return view('pemilih.index', compact('pemilih'));
    }
}
