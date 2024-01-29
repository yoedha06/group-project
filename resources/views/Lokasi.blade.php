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
        <div id="map" style="height: 600px"></div>

        <script>
            // Assuming $pemilih is properly defined and populated on the server-side
            var pemilih = {!! json_encode($pemilih) !!};

            var map = L.map('map').setView([-6.895364793103795, 107.53971757412086], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            pemilih.forEach(function(p) {
                var coordinates = p.koordinat.split(',').map(function(coord) {
                    return parseFloat(coord.trim());
                });

                var marker = L.marker(coordinates).addTo(map);

                marker.bindPopup("<b>Nama Pemilih:</b> " + p.nama_pemilih + "<br><b>koordinat:</b> " + p.koordinat)
                    .openPopup();
            });

            function showLocationOnMap(latitude, longitude) {
                map.setView([latitude, longitude], 13);
            }
        </script>
    </body>

    </html>
@endsection
