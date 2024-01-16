<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk Biasa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        h1{
            font-size: 80px;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
    </style>
</head>
<body>

    <div class="container mt-4">
        <center><h1>Pemilu</h1></center>
        <h2>Pemilih</h2>
        <a href="{{ route('pemilih.create') }}" style="margin-top: 10px;" class="btn btn-success">Tambah Pemilih</a>
    
        <table class="table" style="margin-top: 10px;">
            <thead>
                <tr>
                    <th>id pemilih</th>
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
                        <td>{{ $p->Id_Pemilih }}</td>
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
    

    <!-- Sesuaikan dengan library JavaScript yang Anda gunakan, contoh menggunakan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
