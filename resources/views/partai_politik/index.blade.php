@extends('layouts')
<title>Data Partai Politik</title>
@section('content')
    <div class="container mt-4">
        <center>
            <h1>Pemilu</h1>
        </center>
        <h2>Partai Politik</h2>
        <a href="{{ route('partai_politik.create') }}" class="btn btn-primary mb-3"> <i class="bi bi-plus-lg"></i> Partai
            Politik</a>

        <form action="{{ route('partai_politik.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="keyword" placeholder="Cari Partai Politik...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i> Cari</button>
                </div>
            </div>
        </form>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

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
                @foreach ($partaiPolitiks as $partaiPolitik)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $partaiPolitik->Id_Partai }}</td>
                        <td>{{ $partaiPolitik->NamaPartai }}</td>
                        <td width="200px;">{{ $partaiPolitik->Ideologi }}</td>
                        <td>{{ $partaiPolitik->JumlahAnggota }}</td>
                        <td>{{ $partaiPolitik->PemimpinPartai }}</td>
                        <td>
                            <a
                                href="{{ route('partai_politik.edit', ['Id_Partai' => $partaiPolitik->Id_Partai]) }}"class="btn btn-warning"><i
                                    class="bi bi-pencil-square">&nbsp;</i>Edit</a>
                            <form action="{{ route('partai_politik.delete', ['Id_Partai' => $partaiPolitik->Id_Partai]) }}"
                                method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (request()->has('keyword') && isset($partaiPolitiks) && count($partaiPolitiks) > 0)
            <a href="{{ url()->previous() }}" class="btn btn-success btn-block mt-4"><i
                    class="bi bi-arrow-left-circle"></i>Kembali</a>
        @endif
    </div>
@endsection
