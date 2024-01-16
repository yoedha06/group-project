@extends('layouts')

@section('content')
    <div class="container">
        <h2 class="my-4">Daftar Hasil Pemilihan</h2>

        <div class="mb-3">
            <a href="/hasilpemilihan/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i>Tambah Hasil Pemilih</a>
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
                    <th scope="col">Id Hasil</th>
                    <th scope="col">Id Pemilihan</th>
                    <th scope="col">Id Kandidat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasilpemilihan as $hasil)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $hasil->Id_HasilPemilihan }}</td>
                        <td>{{ $hasil->Id_Pemilih }}</td>
                        <td>{{ $hasil->Id_Kandidat }}</td>
                        <td>
                            <a href="{{ route('hasilpemilihan.edit', ['id' => $hasil->Id_HasilPemilihan]) }}"
                                class="btn btn-warning"><i class="bi bi-pencil-square">&nbsp;</i>Edit</a>
                            <a href="{{ route('hasilpemilihan.delete', ['id' => $hasil->Id_HasilPemilihan]) }}"
                                class="btn btn-danger"><i class="bi bi-trash3-fill">&nbsp;</i>Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (request()->has('keyword') && isset($hasilpemilihan) && count($hasilpemilihan) > 0)
            <a href="{{ url()->previous() }}" class="btn btn-success btn-block mt-4"><i class="bi bi-arrow-left-circle"></i>
                Kembali</a>
        @endif
        @if (!request()->has('keyword'))
            <a href="{{ route('dashboard') }}" class="btn btn-success btn-block mt-4"><i
                    class="bi bi-arrow-left-circle"></i> Back to Dashboard</a>
        @endif
    </div>
@endsection
