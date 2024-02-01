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

        var historyData = @json($history);

        var map = L.map('map');

        var layerGroup = L.layerGroup();
        var polylinePoints = [];

        // ...

        for (var i = 0; i < historyData.length; i++) {
            var latlngStr = historyData[i].latlng;
            var latlngArr = latlngStr.split(", ");
            var lat = parseFloat(latlngArr[0]);
            var lng = parseFloat(latlngArr[1]);
            var speed = parseFloat(historyData[i].speeds);

            var color;
            if (speed < 20) {
                color = 'green';
            } else if (speed >= 20 && speed <= 40) {
                color = 'yellow';
            } else {
                color = 'red';
            }

            var circleMarker = L.circleMarker([lat, lng], {
                radius: 0,
                color: color,
                stroke: false,
            });


            layerGroup.addLayer(circleMarker);

            polylinePoints.push([lat, lng]);
            var polylineColor = speed < 20 ? "green" : speed >= 20 && speed <= 40 ? "yellow" : "red";

            if (polylinePoints.length > 1) {
                // Draw polyline segment with appropriate color and weight
                L.polyline(polylinePoints.slice(-2), {
                    color: polylineColor,
                    weight: 5,
                    opacity: 1.0, // Sesuaikan dengan kebutuhan Anda
                }).addTo(map);
            }
        }

        // ...



        // Adding a Polyline connecting the circle markers
        layerGroup.addTo(map);
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
        
        //BOUNDS
        var bounds = L.latLngBounds(coordinatesArray);
        map.fitBounds(bounds);  // Set MaxBounds agar tidak bisa di-zoom keluar dari garis batas

        // Tambahkan layer tile OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Set view agar peta berada di tengah batas
        map.fitBounds(bounds);
        // Update polyline color based on speed dynamically
        @foreach ($history as $record)
            polyline.setStyle({ color: getColor({{ $record->speeds }}) });
        @endforeach
    </script>
@endsection
