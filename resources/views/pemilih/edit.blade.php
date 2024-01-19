@extends('layouts')
<!DOCTYPE html>
@section('content')
    
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Pemilih</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                <div class="card" style="margin-top: 50px;">
                    <div class="card-header">Edit Pemilih</div>

                    <div class="card-body">
                        <form action="{{ route('pemilih.update', $pemilih->Id_Pemilih) }}" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label for="id_pemilih">ID Pemilih:</label>
                                <input type="text" name="id" class="form-control"
                                value="{{ $pemilih->Id_Pemilih }}" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label for="nama_pemilih">Nama Pemilih:</label>
                                <input type="text" name="nama_pemilih" id="nama_pemilih" class="form-control"
                                value="{{ $pemilih->nama_pemilih }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir:</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                value="{{ $pemilih->tanggal_lahir }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" name="alamat" id="alamat" class="form-control"
                                value="{{ $pemilih->alamat }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="no_ktp">no KTP:</label>
                                <input type="text" name="no_ktp" id="no_ktp" class="form-control"
                                    value="{{ $pemilih->no_ktp }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="status_pemilihan">status pemilihan:</label>
                                    <select name="status_pemilihan" id="status_pemilihan" class="form-control">
                                        <option value="Belum Memilih"
                                        {{ old('status_pemilihan', $pemilih->status_pemilihan) == 'Belum Memilih' ? 'selected' : '' }}>
                                        Belum Memilih</option>
                                        <option value="Sudah Memilih"
                                        {{ old('status_pemilihan', $pemilih->status_pemilihan) == 'Sudah Memilih' ? 'selected' : '' }}>
                                        Sudah Memilih</option>
                                    </select>
                                </div>
                                
                                <div class="text-center">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ route('pemilih.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Sesuaikan dengan library JavaScript yang Anda gunakan, contoh menggunakan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
@endsection
