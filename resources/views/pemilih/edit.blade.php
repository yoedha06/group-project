@extends('layouts')
<!DOCTYPE html>
@section('content')

<html lang="en">

<head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Pemilih</title>

        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                <div class="card bt-3">
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
                                <input type="text" name="nama_pemilih" id="nama_pemilih" class="form-control {{ $errors->has('nama_pemilih') ? 'is-invalid' : '' }}"
                                value="{{ $pemilih->nama_pemilih }}">
                                @error('nama_pemilih')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir:</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}"
                                value="{{ $pemilih->tanggal_lahir }}">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" name="alamat" id="alamat" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}"
                                value="{{ $pemilih->alamat }}">
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="koordinat">Koordinat:</label>
                                <input type="text" name="koordinat" id="koordinat"
                                    class="form-control {{ $errors->has('koordinat') ? 'is-invalid' : '' }}"
                                    value="{{ $pemilih->koordinat }}" readonly>

                            </div>
                            <div id="map" style="height: 400px; width: 100%;"></div>
                            <div class="form-group">
                                <label for="no_ktp">no KTP:</label>
                                <input type="text" name="no_ktp" id="no_ktp" class="form-control {{ $errors->has('no_ktp') ? 'is-invalid' : '' }}"
                                    value="{{ $pemilih->no_ktp }}">
                                </div>
                                @error('no_ktp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="status_pemilihan">status pemilihan:</label>
                                    <select name="status_pemilihan" id="status_pemilihan" class="form-control {{ $errors->has('status_pemilihan') ? 'is-invalid' : '' }}">
                                        <option value="Belum Memilih"
                                        {{ old('status_pemilihan', $pemilih->status_pemilihan) == 'Belum Memilih' ? 'selected' : '' }}>
                                        Belum Memilih</option>
                                        <option value="Sudah Memilih"
                                        {{ old('status_pemilihan', $pemilih->status_pemilihan) == 'Sudah Memilih' ? 'selected' : '' }}>
                                        Sudah Memilih</option>
                                    </select>
                                    @error('status_pemilihan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ route('pemilih.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="map" style="height: 400px; width: 100%;"></div>

            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Koordinat pemilih (ganti ini dengan koordinat yang diinginkan)
            var pemilihCoordinates = [-6.9147, 107.6098];
            var koordinatString = document.getElementById('koordinat').value;
            var koordinatArray = koordinatString.split(',').map(function (item) {
                return parseFloat(item.trim());
            });

            var coordinates = [koordinatArray];

            var map = L.map('map');
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

            // Tambahkan marker di tengah-tengah peta sebagai petunjuk
            var centerMarker = L.marker(pemilihCoordinates, { draggable: true }).addTo(map);

            // Event listener untuk menangani perubahan tampilan peta setelah digeser oleh pengguna
            map.on('move', function () {
                var newLatLng = map.getCenter();
                centerMarker.setLatLng(newLatLng);
                updateCoordinateInput(newLatLng.lat, newLatLng.lng);
            });

            function updateCoordinateInput(lat, lng) {
                document.getElementById('koordinat').value = lat + ', ' + lng;
            }

            // Pemanggilan fungsi untuk menyesuaikan peta saat halaman dimuat
            adjustMap();

            // Fungsi untuk menyesuaikan peta dengan fitBounds saat koordinat diubah
            function adjustMap() {
                map.fitBounds(coordinates, { maxZoom: 13 });
            }
        });
    </script>



</script>

</html>
@endsection