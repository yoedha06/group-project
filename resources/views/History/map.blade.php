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

        var layerGroup = L.layerGroup();
        var polylinePoints = [];

        for (var i = 0; i < historyData.length; i++) {
            var latlngStr = historyData[i].latlng;
            var latlngArr = latlngStr.split(", ");
            var lat = parseFloat(latlngArr[0]);
            var lng = parseFloat(latlngArr[1]);
            var speed = parseFloat(historyData[i].speeds);
            var accuracy = parseFloat(historyData[i].accuracy);

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

            // Calculate polyline color and weight based on accuracy
            var polylineColor = speed < 20 ? "green" : speed >= 20 && speed <= 40 ? "yellow" : "red";
            var polylineWeight;

            if (accuracy >= 10 && accuracy < 20) {
                polylineWeight = 10;
            } else if (accuracy >= 20 && accuracy <= 50) {
                polylineWeight = 5;
            } else {
                polylineWeight = 2;
            }

            if (polylinePoints.length > 1) {
                // Draw polyline segment with appropriate color and weight
                var polyline = L.polyline(polylinePoints.slice(-2), {
                    color: polylineColor,
                    weight: polylineWeight,
                    opacity: 1.0, // Sesuaikan dengan kebutuhan Anda
                }).addTo(map);

                // Add popup with data
                var popupContent = "Speed: " + speed + " km/h<br>Accuracy: " + accuracy + " m";
                polyline.bindPopup(popupContent);
            }
        }

        // Adding a Polyline connecting the circle markers
        layerGroup.addTo(map);
    </script>
@endsection
