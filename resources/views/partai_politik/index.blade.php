@extends('layouts')
<title>Data Partai Politik</title>
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <br>
    <br>
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active"><i class="fas fa-landmark"></i> Partai Politik</li>
    </ol>

    @if (auth()->user()->role === 'admin')
        <a href="{{ route('partai_politik.create') }}" class="btn btn-primary mb-3"> <i class="bi bi-plus-lg"></i> Partai
            Politik</a>
    @endif
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
                <th>Nama Partai</th>
                <th>Ideologi</th>
                <th>Jumlah Anggota</th>
                <th>Pemimpin Partai</th>
                @if (auth()->user()->role === 'admin')
                    <th>Aksi</th>
                @endif

            </tr>
        </thead>
        <tbody>
            @if (count($partaiPolitiks) > 0)
                @foreach ($partaiPolitiks as $partaiPolitik)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $partaiPolitik->NamaPartai }}</td>
                        <td width="200px;">{{ $partaiPolitik->Ideologi }}</td>
                        <td>{{ $partaiPolitik->JumlahAnggota }}</td>
                        <td>{{ $partaiPolitik->PemimpinPartai }}</td>
                        <td>
                            @if (auth()->user()->role === 'admin')
                                <a
                                    href="{{ route('partai_politik.edit', ['Id_Partai' => $partaiPolitik->Id_Partai]) }}"class="btn btn-warning"><i
                                        class="bi bi-pencil-square">&nbsp;</i>Edit</a>
                                <form
                                    action="{{ route('partai_politik.delete', ['Id_Partai' => $partaiPolitik->Id_Partai]) }}"
                                    method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-danger"onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i
                                            class="bi bi-trash"></i>Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" class="text-center">
                        <i class="bi bi-emoji-dizzy" style="font-size: 4rem;"></i>
                        <p class="mt-2">Tidak ada data, maaf.</p>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

    {{ $partaiPolitiks->links('pagination::bootstrap-5') }}


    @if (request()->has('keyword') && isset($partaiPolitiks) && count($partaiPolitiks) > 0)
        <a href="{{ url()->previous() }}" class="btn btn-success btn-block mt-4"><i
                class="bi bi-arrow-left-circle"></i>Kembali</a>
    @endif
    </div>
@endsection
