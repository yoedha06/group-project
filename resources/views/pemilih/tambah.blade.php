@extends('layouts')
    <title>Tambah Pemilih</title>
@section('content')
    
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
                                <input type="text" name="nama_pemilih" id="nama_pemilih" class="form-control {{ $errors->has('nama_pemilih') ? 'is-invalid' : ''}}" value="{{ old('nama_pemilih') }}">
                                @error('nama_pemilih')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                           
                            <br>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : ''}}" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" name="alamat" id="alamat" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : ''}}" value="{{ old('alamat') }}">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="no_ktp">No KTP:</label>
                                <input type="number" name="no_ktp" id="no_ktp" class="form-control {{ $errors->has('no_ktp') ? 'is-invalid' : ''}}" value="{{ old('no_ktp') }}">
                            @error('no_ktp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="status_pemilihan">Status Pemilihan:</label>
                                <select name="status_pemilihan" class="form-control {{ $errors->has('status_pemilihan') ? 'is-invalid' : ''}}" id="status_pemilihan" >
                                    <option value="" selected disabled>Pilih Status</option>
                                    <option value="Belum Memilih" {{ old('status_pemilihan') == 'Belum Memilih' ? 'selected' : '' }}>Belum Memilih</option>
                                    <option value="Sudah Memilih" {{ old('status_pemilihan') == 'Sudah Memilih' ? 'selected' : '' }}>Sudah Memilih</option>
                                </select>
                            @error('status_pemilihan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <br>
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
@endsection
