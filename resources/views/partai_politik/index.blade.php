@extends('layouts')

@section('content')
    <div class="container">
        <h1>Daftar Partai Politik</h1>

        <a href="{{ route('partai_politik.create') }}" class="btn btn-primary mb-3">Tambah Partai Politik</a>

        <table class="table">
            <thead>
                <tr>
                    <th>List</th>
                    <th>ID Partai</th>
                    <th>Nama Partai</th>
                    <th>Ideologi</th>
                    <th>Jumlah Anggota</th>
                    <th>Pemimpin Partai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partaiPolitiks as $partaiPolitik)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $partaiPolitik->Id_Partai }}</td>
                        <td>{{ $partaiPolitik->NamaPartai }}</td>
                        <td>{{ $partaiPolitik->Ideologi }}</td>
                        <td>{{ $partaiPolitik->JumlahAnggota }}</td>
                        <td>{{ $partaiPolitik->PemimpinPartai }}</td>
                        <td>
                        <a href="{{ route('partai_politik.edit', ['Id_Partai' => $partaiPolitik->Id_Partai]) }}" class="btn btn-warning">Edit</a>
                            
                        <form action="{{ route('partai_politik.delete', ['Id_Partai' => $partaiPolitik->Id_Partai]) }}" method="post" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
</form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
