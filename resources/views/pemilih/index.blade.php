    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Produk Biasa</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <style>
        h1 {
            font-size: 80px;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
    </style>
    </head>

    <body>

        <div class="container mt-4">
            <center>
                <h1>Pemilu</h1>
            </center>
            <h2>Pemilih</h2>
            <div class="mb-3">
                <a href="{{ route('pemilih.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> Tambah
                    Pemilih</a>
            </div>


            <form action="{{ route('pemilih.search') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword" placeholder="Cari pemilih...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i>
                            Cari</button>
                    </div>
                </div>
            </form>


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
                                <a href="{{ route('pemilih.edit', $p->Id_Pemilih) }}" class="btn btn-warning"><i
                                        class="bi bi-pencil-square">&nbsp;</i>Edit</a>
                                <form id="deleteForm-{{ $p->Id_Pemilih }}"
                                    action="{{ route('pemilih.delete', $p->Id_Pemilih) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger"
                                        onclick="confirmDelete('{{ $p->Id_Pemilih }}')"><i
                                            class="bi bi-trash3-fill">&nbsp;</i>Hapus</button>
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
            @if (request()->has('keyword') && isset($pemilih) && count($pemilih) > 0)
                <a href="{{ url()->previous() }}" class="btn btn-success btn-sm mt-3">
                    <i class="bi bi-arrow-left-circle"></i> Kembali
                </a>
            @endif


            @if (!request()->has('keyword'))
                <a href="{{ route('dashboard') }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i> Back
                    to Dashboard</a>
            @endif
        </div>
        </div>


        <!-- Sesuaikan dengan library JavaScript yang Anda gunakan, contoh menggunakan Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>
