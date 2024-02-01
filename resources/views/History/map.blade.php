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
        var map = L.map('map').setView([-6.895364793103795, 107.53971757412086], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        @foreach ($history as $record)
            var coordinates = "{{ $record->latlng }}".split(',');
            var lat = parseFloat(coordinates[0]);
            var lng = parseFloat(coordinates[1]);

            var marker = L.circleMarker([lat, lng], {
                radius: 5
            }).addTo(map);

            // Create a popup with latitude and bounds information
            var popupContent = "<b>Latitude:</b> " + lat +
                "<br><b>Longitude:</b> " + lng +
                "<br><b>Bounds:</b> " + "{{ $record->bounds }}";

            marker.bindPopup(popupContent);
        @endforeach

        // Add the polyline after adding the markers
        var coordinatesArray = [
            @foreach ($history as $record)
                [{{ $record->latlng }}],
            @endforeach
        ];

        // Define a function to determine the color based on speed
        function getColor(speeds) {
            return speeds < 40 ? 'green' : speeds < 60 ? 'yellow' : 'red';
        }

        var polyline = L.polyline(coordinatesArray, {
            color: getColor({{ $history[0]->speeds }}), // Initial color based on the first record's speed
        }).addTo(map);

        // Update polyline color based on speed dynamically
        @foreach ($history as $record)
            polyline.setStyle({ color: getColor({{ $record->speeds }}) });
        @endforeach
    </script>
@endsection
