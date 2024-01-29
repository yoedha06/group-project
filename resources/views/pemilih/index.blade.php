@extends('layouts')

@section('content')
    <div class="container mt-4">
        <center>
            <h1>Pemilu</h1>
        </center>
        <h2>Pemilih</h2>

        {{-- Add Pemilih Button --}}
        <div class="mb-3">
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('pemilih.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> Tambah Pemilih</a>
            @endif
        </div>

        {{-- Search Form --}}
        <form action="{{ route('pemilih.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="keyword" style="border-radius: 7px;"
                    placeholder="Cari pemilih...">&nbsp;
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i> Cari</button>
                </div>
            </div>
        </form>

        {{-- Success Message --}}
        @if ($message = session('berhasil'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Pemilih Table --}}
        <table class="table table-bordered table-striped" style="margin-top: 10px;">
            <thead style="text-align: center;">
                <tr>
                    <th>No</th>
                    <th>Nama Pemilih</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Koordinat</th>
                    <th>No KTP</th>
                    <th>Status Pemilihan</th>
                    @if (auth()->user()->role === 'admin')
                        <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($pemilih as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama_pemilih }}</td>
                        <td>{{ $p->tanggal_lahir }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td style="width:100px;">{{ $p->koordinat }}</td>
                        <td>{{ $p->no_ktp }}</td>
                        <td>
                            <span class="badge {{ $p->status_pemilihan == 'Sudah Memilih' ? 'bg-success' : 'bg-danger' }}">
                                {{ $p->status_pemilihan }}
                            </span>
                        </td>
                        <td>
                            @if (auth()->user()->role === 'admin')
                                {{-- Edit Button --}}
                                <a href="{{ route('pemilih.edit', $p->Id_Pemilih) }}" class="btn btn-warning"><i
                                        class="bi bi-pencil-square"></i> Edit</a>

                                {{-- Delete Form --}}
                                <form id="deleteForm-{{ $p->Id_Pemilih }}"
                                    action="{{ route('pemilih.delete', $p->Id_Pemilih) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger"
                                        onclick="confirmDelete('{{ $p->Id_Pemilih }}')"><i
                                            class="bi bi-trash3-fill"></i> Hapus</button>
                                </form>
                            @endif

                            {{-- JavaScript Confirm Delete --}}
                            <script>
                                function confirmDelete(Id_Pemilih) {
                                    if (confirm("Apakah Anda yakin ingin menghapus pemilih ini?")) {
                                        document.getElementById('deleteForm-' + Id_Pemilih).submit();
                                    } else {
                                        alert("Penghapusan pemilih dibatalkan.");
                                    }
                                }
                            </script>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination Links --}}
        <div class="flex justify-content-center">
            {{ $pemilih->links('pagination::bootstrap-5') }}
        </div>

        {{-- Back Button --}}
        @if (request()->has('keyword') && isset($pemilih) && count($pemilih) > 0)
            <a href="{{ url()->previous() }}" class="btn btn-success btn-sm mt-3">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        @endif
    </div>
@endsection
