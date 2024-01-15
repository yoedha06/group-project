@extends('layout.jek')

@section('content')

    <div class="container mt-5">
        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <h5 class="card-title text-center">Tambah Data Kandidat</h5>
                <hr class="my-4">
                <form action="/kandidat/store" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label for="Nama_Kandidat" class="col-sm-3 col-form-label">Nama Kandidat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Nama_Kandidat" name="Nama_Kandidat" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Tanggal_Lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="Tanggal_Lahir" name="Tanggal_Lahir" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Partai_Politik" class="col-sm-3 col-form-label">Partai Politik</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Partai_Politik" name="Partai_Politik" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Nomor_Urut" class="col-sm-3 col-form-label">Nomor Urut</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="Nomor_Urut" name="Nomor_Urut" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Program_Kerja" class="col-sm-3 col-form-label">Program Kerja</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Program_Kerja" name="Program_Kerja" required>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-success btn-block mt-4"><i class="bi bi-plus-lg"></i> Tambah Data
                        Kandidat</button>
                    <a href="/kandidat" class="btn btn-warning btn-block mt-4"><i class="bi bi-arrow-left-circle"></i>
                        Kembali</a>
                </form>
            </div>
        </div>
    </div>

@endsection
