@extends('layouts')

<head>
    <!-- Tambahkan library Leaflet CSS dan JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <!-- Tambahkan Leaflet JS dan CSS sekali lagi (untuk memastikan keberlanjutan) -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <title>Tambah Pemilih</title>
</head>

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 40px;">
                <div class="card-header">Tambah Pemilih</div>

                <div class="card-body">
                    <form action="{{ route('pemilih.store') }}" method="POST">
                        @csrf

                        <!-- Nama Pemilih -->
                        <div class="form-group">
                            <label for="nama_pemilih">Nama Pemilih:</label>
                            <input type="text" name="nama_pemilih" id="nama_pemilih"
                                class="form-control {{ $errors->has('nama_pemilih') ? 'is-invalid' : ''}}"
                                value="{{ old('nama_pemilih') }}">
                            @error('nama_pemilih')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : ''}}"
                                value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" name="alamat" id="alamat"
                                class="form-control {{ $errors->has('alamat') ? 'is-invalid' : ''}}"
                                value="{{ old('alamat') }}">
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Kota -->
                        <div class="form-group">
                            <label for="kota">Kota:</label>
                            <select name="kota" id="kota" class="form-control">
                                <option value="" selected disabled>Pilih Kota</option>
                            </select>
                        </div>

                        <!-- Kecamatan -->
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan:</label>
                            <select name="kecamatan" id="kecamatan" class="form-control">
                                <option value="" selected disabled>Pilih Kecamatan</option>
                            </select>
                        </div>

                        <!-- Kode Pos -->
                        <div class="form-group">
                            <label for="kode_pos">Kode Pos:</label>
                            <input type="text" id="kode_pos" name="kode_pos" readonly class="form-control">
                        </div>

                        <!-- Input tersembunyi untuk latitude dan longitude -->
                        <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude', -6.2088) }}">
                        <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude', 106.8456) }}">

                        <!-- Peta -->
                        <div id="map" style="height: 300px;"></div>

                        <!-- No KTP -->
                        <div class="form-group">
                            <label for="no_ktp">No KTP:</label>
                            <input type="number" name="no_ktp" id="no_ktp"
                                class="form-control {{ $errors->has('no_ktp') ? 'is-invalid' : ''}}"
                                value="{{ old('no_ktp') }}">
                            @error('no_ktp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status Pemilihan -->
                        <div class="form-group">
                            <label for="status_pemilihan">Status Pemilihan:</label>
                            <select name="status_pemilihan"
                                class="form-control {{ $errors->has('status_pemilihan') ? 'is-invalid' : ''}}"
                                id="status_pemilihan">
                                <option value="" selected disabled>Pilih Status</option>
                                <option value="Belum Memilih"
                                    {{ old('status_pemilihan') == 'Belum Memilih' ? 'selected' : '' }}>Belum
                                    Memilih</option>
                                <option value="Sudah Memilih"
                                    {{ old('status_pemilihan') == 'Sudah Memilih' ? 'selected' : '' }}>Sudah
                                    Memilih</option>
                            </select>
                            @error('status_pemilihan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Tombol Submit dan Batal -->
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

<script>
    // Inisialisasi map
    var map = L.map('map').setView([-6.2088, 106.8456], 6); // Koordinat untuk Indonesia
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Marker yang dapat di-drag
    var marker = L.marker([-6.2088, 106.8456], { draggable: true }).addTo(map);

    // Elemen dropdown untuk kota, kecamatan, dan kode pos
    var kotaDropdown = document.getElementById('kota');
    var kecamatanDropdown = document.getElementById('kecamatan');
    var kodePosInput = document.getElementById('kode_pos');

    // Event listener saat marker di-dragend
    marker.on('dragend', function (event) {
        var position = marker.getLatLng();
        getAddressFromCoordinates(position.lat, position.lng);
    });

    // Fungsi untuk mendapatkan alamat dari koordinat
    function getAddressFromCoordinates(latitude, longitude) {
        var apiUrl = `https://dev.farizdotid.com/api/daerahindonesia?lat=${latitude}&lon=${longitude}`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                var city = data.kota_kabupaten || '';
                var kecamatan = data.kecamatan || '';
                var kodePos = data.kode_pos || '';

                document.getElementById('kota').value = city;
                document.getElementById('kecamatan').value = kecamatan;
                document.getElementById('kode_pos').value = kodePos;

                // Memperbarui dropdown kecamatan
                fillKecamatanOptions(city);
            })
            .catch(error => console.error('Error fetching address:', error));
    }

    // Panggil fungsi saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function () {
        fillKotaOptions();
    });

    // Fungsi untuk mengisi dropdown kota
    function fillKotaOptions() {
        var apiUrl = 'https://dev.farizdotid.com/api/daerahindonesia/kota';

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                data.kota_kabupaten.forEach(kota => {
                    var option = document.createElement('option');
                    option.value = kota.nama;
                    option.textContent = kota.nama;
                    kotaDropdown.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Fungsi untuk mengisi dropdown kecamatan
    function fillKecamatanOptions(city) {
        var apiUrl = `https://dev.farizdotid.com/api/daerahindonesia/kecamatan?kota=${city}`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                kecamatanDropdown.innerHTML = '<option value="" selected disabled>Pilih Kecamatan</option>';
                data.kecamatan.forEach(kecamatan => {
                    var option = document.createElement('option');
                    option.value = kecamatan.nama;
                    option.textContent = kecamatan.nama;
                    kecamatanDropdown.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Event listener saat kota dipilih
    kotaDropdown.addEventListener('change', function () {
        var city = this.value;
        getAddressFromCoordinates(marker.getLatLng().lat, marker.getLatLng().lng);
    });
</script>


@endsection
