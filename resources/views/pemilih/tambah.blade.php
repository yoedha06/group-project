<!-- resources/views/produk/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pemilih</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
    <!-- Jika menggunakan Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top:40px;">
                    <div class="card-header">Tambah Pemilih</div>
    
                    <div class="card-body">
                        <form action="{{ route('pemilih.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nama_pemilih">Nama Pemilih:</label>
                                <input type="text" name="nama_pemilih" id="nama_pemilih" class="form-control" value="{{ old('nama_pemilih') }}" required>
                            </div>
    
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
                            </div>
    
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat') }}" required>
                            </div>
    
                            <div class="form-group">
                                <label for="no_ktp">No KTP:</label>
                                <input type="text" name="no_ktp" id="no_ktp" class="form-control" value="{{ old('no_ktp') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="status_pemilihan">Status Pemilihan:</label>
                                <select name="status_pemilihan" class="form-control" required>
                                    <option value="" selected disabled>Pilih Status</option>
                                    <option value="Belum Memilih" {{ old('status_pemilihan') == 'Belum Memilih' ? 'selected' : '' }}>Belum Memilih</option>
                                    <option value="Sudah Memilih" {{ old('status_pemilihan') == 'Sudah Memilih' ? 'selected' : '' }}>Sudah Memilih</option>
                                </select>
                            </div>
    
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Tambah Pemilih</button>
                                <a href="{{ route('pemilih.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Jika menggunakan Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
