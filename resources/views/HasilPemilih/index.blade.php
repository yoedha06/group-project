@extends('layouts')
<title>Data Pemilihan </title>
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
                            <li class="breadcrumb-item active"><i class="fas fa-poll"></i> Hasil Pemilihan</li>
                        </ol>
                    </div>
                    <div class="col-auto" style="padding: 2px;">
                        @if (auth()->user()->role === 'admin')
                            <a href="/hasilpemilihan/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i>Tambah Hasil Pemilih</a>
                        @endif
                        <a href="{{route("home")}}" class="btn btn-warning"><i class="bi bi-bar-chart-line-fill"></i>&nbsp;view grafik</a>
                    </div>
                </div>
            </div>
        </nav>
        <br>

        <form action="{{ route('hasilpemilihan.search') }}" method="GET" class="mb-4">
            <div class="input-group" style="margin-top: -19px;">
                <input type="text" class="form-control" name="keyword" style="border-radius:7px;"
                    placeholder="Cari pemilih...">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary mx-2" type="submit"><i class="bi bi-search"></i> Cari</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered mt-4" style="margin-top:-10px;">
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
                @if (count($hasilpemilihan) > 0)
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
        {{ $hasilpemilihan->links('pagination::bootstrap-5') }}
        @if (request()->has('keyword') && isset($hasilpemilihan) && count($hasilpemilihan) > 0)
            <a href="{{ url()->previous() }}" class="btn btn-success btn-block mt-4"><i class="bi bi-arrow-left-circle"></i>
                Kembali</a>
        @endif
        </div>
    </div>
@endsection
