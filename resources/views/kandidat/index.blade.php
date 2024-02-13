@extends('layouts')
<title>kandidat</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@section('content')
    <div class="content-wrapper">
        <br>
        <nav aria-label="breadcrumb">
            <div class="container">
                <div class="row align-items-center" style="margin-top:-15px;">
                    <div class="col">
                        <ol class="breadcrumb" style="margin: 10px;">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active"><i class="fas fa-user"></i> Kandidat</li>
                        </ol>
                    </div>
                    <div class="col-auto" style="padding: 2px;">
                        @if (auth()->user()->role === 'admin')
                            <a href="/kandidat/create" type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Data
                                Kandidat</a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
        <br>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <form action="{{ route('kandidat.search') }}" method="GET" class="mb-4">
            <div class="input-group" style="margin-top: -19px;">
                <input type="text" class="form-control" name="keyword" placeholder="Cari kandidat..." style="border-radius: 7px;">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary mx-2" type="submit"><i class="bi bi-search"></i> Cari</button>
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
                    @if (auth()->user()->role === 'admin')
                        <th scope="col" style="width: 50px;">Aksi</th>
                    @endif
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
                        @if (auth()->user()->role === 'admin')
                            <td style="width:200px;">
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
                        @endif
                    </tr>
                @endforeach

            </tbody>
        </table>

        @if (request()->has('keyword') && isset($kandidat) && count($kandidat) > 0)
            <a href="{{ url()->previous() }}" class="btn btn-success btn-block mt-4"><i
                    class="bi bi-arrow-left-circle"></i> Kembali</a>
        @endif
    </div>
@endsection
