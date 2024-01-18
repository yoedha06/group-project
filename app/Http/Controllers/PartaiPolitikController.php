<?php

namespace App\Http\Controllers;

use App\Models\PartaiPolitik;
use Illuminate\Http\Request;

class PartaiPolitikController extends Controller
{
    public function index()
    {
        $partaiPolitiks = PartaiPolitik::all();
        return view('partai_politik.index', ['partaiPolitiks' => $partaiPolitiks]);
    }

    public function create()
    {
        return view('partai_politik.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'NamaPartai' => 'required',
            'Ideologi' => 'required',
            'JumlahAnggota' => 'required|integer',
            'PemimpinPartai' => 'required',
        ]);

        PartaiPolitik::create($data);

        return redirect()->route('partai_politik.index');
    }

    public function edit($Id_Partai)
    {
        $partaiPolitik = PartaiPolitik::findOrFail($Id_Partai);
        return view('partai_politik.edit', compact('partaiPolitik'));
    }

    public function update(Request $request, $Id_Partai)
    {
        $request->validate([
            'NamaPartai' => 'required',
            'Ideologi' => 'required',
            'JumlahAnggota' => 'required|integer',
            'PemimpinPartai' => 'required',
        ]);

        $partaiPolitik = PartaiPolitik::findOrFail($Id_Partai);
        $partaiPolitik->update($request->all());

        return redirect()->route('partai_politik.index')->with('success', 'Partai Politik berhasil diperbarui!.');
    }
    public function delete($Id_Partai)
    {
        $partaiPolitik = PartaiPolitik::findOrFail($Id_Partai);
        $partaiPolitik->delete();

        return redirect()->route('partai_politik.index')->with('successs', 'Partai Politik berhasil dihapus!.');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $partaiPolitiks = PartaiPolitik::where('NamaPartai', 'like', "%$keyword%")
            ->orWhere('Ideologi', 'like', "%$keyword%")
            ->orWhere('Id_Partai', 'like', "%$keyword%")
            ->orWhere('Ideologi', 'like', "%$keyword%")
            ->orWhere('JumlahAnggota', 'like', "%$keyword%")
            ->orWhere('PemimpinPartai', 'like', "%$keyword%")
            ->get();

        return view('partai_politik.index', compact('partaiPolitiks'));
    }
}
