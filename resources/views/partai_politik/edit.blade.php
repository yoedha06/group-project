@extends('layouts')
<title>Edit Data Partai Politik</title>
@section('content')
    <div class="container">
        <h2>Edit Partai Politik</h2>

        <form action="{{ route('partai_politik.update', ['Id_Partai' => $partaiPolitik->Id_Partai]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="NamaPartai">Nama Partai:</label>
                <input type="text" class="form-control" name="NamaPartai" value="{{ $partaiPolitik->NamaPartai }}" required>
            </div>

            <div class="form-group">
                <label for="Ideologi">Ideologi:</label>
                <input type="text" class="form-control" name="Ideologi" value="{{ $partaiPolitik->Ideologi }}" required>
            </div>

            <div class="form-group">
                <label for="JumlahAnggota">Jumlah Anggota:</label>
                <input type="number" class="form-control" name="JumlahAnggota"value="{{ $partaiPolitik->JumlahAnggota }}"
                    required>
            </div>

            <div class="form-group">
                <label for="PemimpinPartai">Pemimpin Partai:</label>
                <input type="text" class="form-control" name="PemimpinPartai"value="{{ $partaiPolitik->PemimpinPartai }}"
                    required>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Simpan Perubahan</button>
            <a href="{{ route('partai_politik.index') }}" class="btn btn-outline-secondary mt-4">Batal</a>
        </form>
    </div>
@endsection
