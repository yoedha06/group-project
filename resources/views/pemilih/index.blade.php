@extends('layouts')

    <title>Data Produk Biasa</title>
@section('content')
    <div class="container mt-4">
        <center><h1>Pemilu</h1></center>
        <h2>Pemilih</h2>
        <a href="{{ route('pemilih.create') }}" style="margin-top: 10px;" class="btn btn-success">Tambah Pemilih</a>
    
        <table class="table" style="margin-top: 10px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>nama pemilih</th>
                    <th>tanggal lahir</th>
                    <th>alamat</th>
                    <th>no KTP</th>
                    <th>status pemilihan</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemilih as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama_pemilih }}</td>
                        <td>{{ $p->tanggal_lahir }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->no_ktp }}</td>
                        <td>{{ $p->status_pemilihan }}</td>

                        <td>
                            <a href="{{ route('pemilih.edit', $p->Id_Pemilih) }}" class="btn btn-warning">Edit</a>
                            <form id="deleteForm-{{ $p->Id_Pemilih }}" action="{{ route('pemilih.delete', $p->Id_Pemilih) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $p->Id_Pemilih }}')">Hapus</button>
                            </form>
                            
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
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection   
