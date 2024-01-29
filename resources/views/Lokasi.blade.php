@extends('layouts')

@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Map</title>
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    </head>

    <body>
        <form id="searchForm">
            <label for="searchInput">Cari Pemilih:</label>
            <input type="text" id="searchInput" placeholder="Masukkan nama pemilih">
            <button type="button" onclick="searchPemilih()">Cari</button>
        </form>
        
        <div id="map" style="height: 70vh; margin-top:5px;"></div>

        <script>
            var pemilih = {!! json_encode($pemilih) !!};
            var map = L.map('map').setView([-6.895364793103795, 107.53971757412086], 13);
    
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
    
            var markers = [];
    
            pemilih.forEach(function (p) {
                var coordinates = p.koordinat.split(',').map(function (coord) {
                    return parseFloat(coord.trim());
                });
    
                var marker = L.marker(coordinates).addTo(map);
                marker.bindPopup("<b>Nama Pemilih:</b> " + p.nama_pemilih + "<br><b>Koordinat:</b> " + p.koordinat);
                markers.push({
                    marker: marker,
                    nama_pemilih: p.nama_pemilih.toLowerCase()
                });
            });
    
            function showLocationOnMap(latitude, longitude) {
                map.setView([latitude, longitude], 13);
            }
    
            function searchPemilih() {
                var searchInput = document.getElementById('searchInput').value.toLowerCase();

                // Reset warna marker sebelumnya
                markers.forEach(function (m) {
                    m.marker.setIcon(new L.Icon.Default());
                });

                // Cari pemilih sesuai input
                var matchingMarkers = markers.filter(function (m) {
                    return m.nama_pemilih.includes(searchInput);
                });

                if (matchingMarkers.length === 0) {
                    // Tampilkan alert jika tidak ada data yang sesuai
                    alert('Tidak ada data yang sesuai dengan pencarian.');
                } else {
                    // Tampilkan popup dengan informasi pemilih
                    matchingMarkers.forEach(function (m) {
                        m.marker.openPopup();
                    });
                }
            }
        </script>
    </body>

    </html>
@endsection
