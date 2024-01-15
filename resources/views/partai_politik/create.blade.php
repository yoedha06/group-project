@extends('layouts')

@section('content')
    <div class="container">
        <h1>Formulir Pembuatan Partai Politik Baru</h1>

        <form action="{{ route('partai_politik.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="NamaPartai">Nama Partai:</label>
                <input type="text" class="form-control" name="NamaPartai" required>
            </div>

            <div class="form-group">
                <label for="Ideologi">Ideologi:</label>
                <input type="text" class="form-control" name="Ideologi" required>
            </div>

            <div class="form-group">
                <label for="JumlahAnggota">Jumlah Anggota:</label>
                <input type="number" class="form-control" name="JumlahAnggota" required>
            </div>

            <div class="form-group">
                <label for="PemimpinPartai">Pemimpin Partai:</label>
                <input type="text" class="form-control" name="PemimpinPartai" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('partai_politik.index') }}" class="btn btn-outline-secondary">Batal</a>
        </form>
    </div>
@endsection