@extends('layouts')
<title>Edit Data Pemilih </title>
@section('content')
    <div class="container">
        <h2 class="my-4">Tambah Hasil Pemilihan Baru</h2>

        <form action="{{ route('hasilpemilihan.update', ['id' => $hasilpemilihan->Id_HasilPemilihan]) }}" method="POST">
            @csrf

            <!-- Id_Pemilih -->
            <div class="form-group">
                <label for="Id_Pemilih" class="form-label">
                    <h4>Id Pemilih</h4>
                </label>
                <select class="form-select form-select-lg" name="Id_Pemilih" id="Id_Pemilih">
                    @foreach ($pemilih as $p)
                        <option value="{{ $p->Id_Pemilih }}">{{ $p->Id_Pemilih }} - {{ $p->nama_pemilih }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Id_Kandidat -->
            <div class="form-group">
                <label for="Id_Kandidat" class="form-label">
                    <h4>Id Kandidat</h4>
                </label>
                <select class="form-select form-select-lg" name="Id_Kandidat" id="Id_Kandidat">
                    @foreach ($kandidat as $k)
                        <option value="{{ $k->Id_Kandidat }}">{{ $k->Id_Kandidat }} - {{ $k->Nama_Kandidat }}</option>
                    @endforeach
                </select>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="btn btn-primary mt-4">Tambah Hasil Pemilihan</button>
            <a href="/hasilpemilihan" class="btn btn-warning btn-block mt-4"><i class="bi bi-arrow-left-circle"></i>
                Kembali</a>
        </form>
    </div>
@endsection
