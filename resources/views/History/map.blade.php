@extends('layouts')
<title>Peta</title>

<head>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.min.js"></script>
    <script src="https://unpkg.com/@geoman-io/leaflet-geoman-free"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
</head>

@section('content')
    <div id="map" style="height: 600px"></div>
    <script>
        var map = L.map('map');

        var coordinatesArray = [];

        @foreach ($history as $record)
            var coordinates = "{{ $record->latlng }}".split(',');
            var lat = parseFloat(coordinates[0]);
            var lng = parseFloat(coordinates[1]);

            var marker = L.circleMarker([lat, lng], {
                radius: 5
            }).addTo(map);

            coordinatesArray.push([lat, lng]);
        @endforeach

        var polyline = L.polyline(coordinatesArray, {
            color: 'blue'
        }).addTo(map);

        //BOUNDS
        var bounds = L.latLngBounds(coordinatesArray);
        map.fitBounds(bounds);  // Set MaxBounds agar tidak bisa di-zoom keluar dari garis batas

        // Tambahkan layer tile OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Set view agar peta berada di tengah batas
        map.fitBounds(bounds);
    </script>
@endsection
