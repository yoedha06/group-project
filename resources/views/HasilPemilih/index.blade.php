@extends('layouts')

@section('content')
    <div class="container">
        <h2 class="my-4">Daftar Hasil Pemilihan</h2>

        <a href="/hasilpemilihan/create" class="btn btn-primary ">Tambah Hasil Pemilih</a>
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
                                class="btn btn-warning">Edit</a>
                            <a href="{{ route('hasilpemilihan.delete', ['id' => $hasil->Id_HasilPemilihan]) }}"
                                class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali</a>

    </div>
@endsection
