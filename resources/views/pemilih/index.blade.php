@extends('layouts')
<title>
    Pemilih</title>
@section('content')
    <div class="container mt-4">
        <center>
            <h1>Pemilu</h1>
        </center>
        <h2>Pemilih</h2>
        <div class="mb-3">
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('pemilih.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> Tambah
                    Pemilih</a>
            @endif
        </div>
        {{-- button search --}}
        <form action="{{ route('pemilih.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="keyword" style="border-radius: 7px;"
                    placeholder="Cari pemilih...">&nbsp;
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i>
                        Cari</button>
                </div>
            </div>
        </form>
        @if ($message = session('berhasil'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table table-bordered table-striped" style="margin-top: 10px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>nama pemilih</th>
                    <th>tanggal lahir</th>
                    <th>alamat</th>
                    <th>koordinat</th>
                    <th>no KTP</th>
                    <th>status pemilihan</th>
                    @if (auth()->user()->role === 'admin')
                        <th>aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($pemilih as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama_pemilih }}</td>
                        <td>{{ $p->tanggal_lahir }}</td>
                        <td> {{ $p->alamat }}</td>
                        <td> {{ $p->koordinat }}</td>
                        <td>{{ $p->no_ktp }}</td>
                        <td>{{ $p->status_pemilihan }}</td>
                        <td>
                            @if (auth()->user()->role === 'admin')
                                {{-- <a href="{{ route('Lokasi', $p->Id_Pemilih) }}" class="btn btn-success"><i
                                        class="bi bi-pencil-square">&nbsp;</i>maps</a> --}}


                                <a href="{{ route('pemilih.edit', $p->Id_Pemilih) }}" class="btn btn-warning"><i
                                        class="bi bi-pencil-square">&nbsp;</i>Edit</a>

                                <a href="{{ route('lokasi', $p->Id_Pemilih) }}" class="btn btn-success"><i
                                        class="bi bi-pencil-square">&nbsp;</i>Map</a>

                                <form id="deleteForm-{{ $p->Id_Pemilih }}"
                                    action="{{ route('pemilih.delete', $p->Id_Pemilih) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger"
                                        onclick="confirmDelete('{{ $p->Id_Pemilih }}')"><i
                                            class="bi bi-trash3-fill">&nbsp;</i>Hapus</button>
                                </form>
                            @endif

                            <script>
                                function confirmDelete(Id_Pemilih) {
                                    if (confirm("Apakah Anda yakin ingin menghapus produk ini?")) {
                                        document.getElementById('deleteForm-' + Id_Pemilih).submit();
                                    } else {
                                        alert("Penghapusan produk dibatalkan.");
                                        // atau tambahkan tindakan lainnya jika diperlukan
                                    }
                                }
                            </script>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (request()->has('keyword') && isset($pemilih) && count($pemilih) > 0)
            <a href="{{ url()->previous() }}" class="btn btn-success btn-sm mt-3">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        @endif
    </div>
    </div>


    <!-- Sesuaikan dengan library JavaScript yang Anda gunakan, contoh menggunakan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>
@endsection
