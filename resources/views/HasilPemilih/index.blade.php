@extends('layouts')
<title>Data Pemilihan </title>
@section('content')
    <div class="container mt-4">
        <center>
            <h1>Pemilu</h1>
        </center>
        <h2>Hasil Pemilihan</h2>
        <div class="mb-3">
            @if (auth()->user()->role === 'admin')
                <a href="/hasilpemilihan/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i>Tambah Hasil Pemilih</a>
            @endif
        </div>
        <div class="mb-3 float-right">
            @if (auth()->user()->role === 'admin')
                <a href="/hasilpemilihan/grafik" class="btn btn-success">
                    <i class="bi bi-bar-chart-line"></i> <!-- Icon grafik menggunakan Bootstrap Icons -->
                    Lihat Grafik
                </a>
            @endif
        </div>

        <form action="{{ route('hasilpemilihan.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="keyword" placeholder="Cari kandidat...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i> Cari</button>
                </div>
            </div>
        </form>
        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    {{-- <th scope="col">Id Hasil</th> --}}
                    <th scope="col">Nama Pemilih</th>
                    <th scope="col">Nama Kandidat</th>
                    @if (auth()->user()->role === 'admin')
                        <th scope="col">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($hasilpemilihan as $hasil)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- <td>{{ $hasil->Id_HasilPemilihan }}</td> --}}
                        <td>{{ $hasil->pemilih->nama_pemilih ?? 'Null' }}</td>
                        <td>{{ $hasil->kandidat->Nama_Kandidat ?? 'Null' }}</td>
                        <td>
                            @if (auth()->user()->role === 'admin')
                                <a href="{{ route('hasilpemilihan.edit', ['id' => $hasil->Id_HasilPemilihan]) }}"
                                    class="btn btn-warning"><i class="bi bi-pencil-square">&nbsp;</i>Edit</a>
                                <a href="{{ route('hasilpemilihan.delete', ['id' => $hasil->Id_HasilPemilihan]) }}"
                                    class="btn btn-danger"><i class="bi bi-trash3-fill">&nbsp;</i>Hapus</button>
                        </td>
                @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        @if (request()->has('keyword') && isset($hasilpemilihan) && count($hasilpemilihan) > 0)
            <a href="{{ url()->previous() }}" class="btn btn-success btn-block mt-4"><i
                    class="bi bi-arrow-left-circle"></i>Kembali</a>
        @endif
    </div>
@endsection
