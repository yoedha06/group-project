@extends('layouts')
<title>Tambah Data Pemilih </title>
@section('content')
    <div class="container">
        <h2 class="my-4">Tambah Hasil Pemilihan Baru</h2>

        <form action="{{ route('hasilpemilihan.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="id_hasil">ID Hasil:</label>
                <input type="text" class="form-control" id="id_hasil" name="Id_HasilPemilihan" required>
            </div>

            <div class="form-group">
                <label for="id_pemilihan">ID Pemilihan:</label>
                <input type="text" class="form-control" id="id_pemilihan" name="Id_Pemilih" required>
            </div>

            <div class="form-group">
                <label for="id_kandidat">ID Kandidat:</label>
                <input type="text" class="form-control" id="id_kandidat" name="Id_Kandidat" required>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Tambah Hasil Pemilihan</button>
        </form>
    </div>
@endsection
