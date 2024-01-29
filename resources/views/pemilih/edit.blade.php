@extends('layouts')
<!DOCTYPE html>
@section('content')

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Pemilih</title>
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
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
                                <div id="map" style="height: 70vh; margin-top:5px;"></div>
                            </div>
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
            </div>
        </div>
    </div>

    <!-- Sesuaikan dengan library JavaScript yang Anda gunakan, contoh menggunakan Bootstrap JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<script>
    var map = L.map('map').setView([-2.5489, 118.0149], 5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    var marker = L.marker([-2.5489, 118.0149], { draggable: true }).addTo(map);

    map.on('move', function (e) {
        var newLatLng = map.getCenter();
        marker.setLatLng(newLatLng);
        updateCoordinateInput(newLatLng.lat, newLatLng.lng);
    });

    marker.on('dragend', function (e) {
        var newLatLng = marker.getLatLng();
        map.setView(newLatLng);
        updateCoordinateInput(newLatLng.lat, newLatLng.lng);
    });

    function updateCoordinateInput(lat, lng) {
        document.getElementById('koordinat').value = lat + ', ' + lng;
    }

    function showAddressOnMap(address) {
        geocodeAddress(address, function(coordinates) {
            if (coordinates) {
                var newLatLng = L.latLng(coordinates[0], coordinates[1]);
                map.setView(newLatLng);
                marker.setLatLng(newLatLng);
                updateCoordinateInput(newLatLng.lat, newLatLng.lng);
            } else {
                console.error('Geocoding failed for address: ' + address);
            }
        });
    }

    // Panggil fungsi untuk menampilkan alamat pada peta (gunakan alamat dari data)
    @if(isset($pemilih->alamat))
        showAddressOnMap('{{ $pemilih->alamat }}');
    @endif

    function geocodeAddress(address, callback) {
        var geocodingUrl = 'https://nominatim.openstreetmap.org/search?format=json&limit=1&q=' + encodeURIComponent(address);

        fetch(geocodingUrl)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    var location = data[0];
                    var coordinates = [location.lat, location.lon];
                    callback(coordinates);
                } else {
                    console.error('Geocoding failed for address: ' + address);
                    callback(null);
                }
            })
            .catch(error => {
                console.error('Error during geocoding: ', error);
                callback(null);
            });
    }
</script>
</html>
@endsection
