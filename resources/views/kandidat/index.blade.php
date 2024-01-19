@extends('layouts')

@section('content')
    <div class="container mt-4">
        <center>
            <h1>Kandidat</h1>
        </center>
        <h2>Kandidat</h2>
        <main>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="/kandidat/create" type="button" class="btn btn-primary mb-4"><i class="bi bi-plus-lg"></i> Tambah Data
                Kandidat</a>

            <form action="{{ route('kandidat.search') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword" placeholder="Cari kandidat...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i> Cari</button>
                    </div>
                </div>
            </form>

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kandidat</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Partai Politik</th>
                        <th scope="col">Nomor Urut</th>
                        <th scope="col">Program Kerja</th>
                        <th scope="col" style="width= 50px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kandidat as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td width="200px;">{{ $item->Nama_Kandidat }}</td>
                            <td>{{ $item->Tanggal_Lahir }}</td>
                            <td>{{ $item->Partai_Politik }}</td>
                            <td>{{ $item->Nomor_Urut }}</td>
                            <td>{{ $item->Program_Kerja }}</td>
                            <td>
                                <a href="/kandidat/edit/{{ $item->Id_Kandidat }}" class="btn btn-warning btn-sm"><i
                                        class="bi bi-pencil-square">&nbsp;</i>Edit</a>
                                <form action="/kandidat/destroy{{ $item->Id_Kandidat }}" method="POST"
                                    style="display: inline-block;" onsubmit="return confirm('Yakin ingin hapus data?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="bi bi-trash3-fill">&nbsp;</i>Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (request()->has('keyword') && isset($kandidat) && count($kandidat) > 0)
                <a href="{{ url()->previous() }}" class="btn btn-success btn-block mt-4"><i
                        class="bi bi-arrow-left-circle"></i> Kembali</a>
            @endif

            {{-- Display "Back to Dashboard" button if no search keyword is present --}}
           
        </main>
    </div>
@endsection
