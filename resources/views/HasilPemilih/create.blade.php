@extends('layouts')
<title>Tambah Data Pemilih </title>
@section('content')
    <div class="container">
        <h2 class="my-4">Tambah Hasil Pemilihan Baru</h2>

        <form action="{{ route('hasilpemilihan.store') }}" method="POST">
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

            <button type="submit" class="btn btn-primary mt-4">Tambah Hasil Pemilihan</button>
        </form>
    </div>
@endsection
