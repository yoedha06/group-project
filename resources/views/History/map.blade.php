@extends('layouts')
<title>Peta</title>

<head>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.min.js"></script>
    <script src="https://unpkg.com/@geoman-io/leaflet-geoman-free"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        #map {
            display: grid;
            height: 580px;
            margin-top: 20px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

@section('content')
    <button class="btn btn-danger" onclick="window.location.href='{{ route('history.index') }}'"
        style="padding:10px;margin-top:10px;"><i class="bi bi-arrow-left-circle"></i>&nbsp;Kembali ke History</button>
    <div id="map" style="height: 650px;margin-top:9px;border-radius:10px;"></div>
    <script>
        var map = L.map('map').setView([-6.895364793103795, 107.53971757412086], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var customIcon = L.icon({
            iconUrl: '/assets/images/hitamm-removebg-preview.png', // Ganti dengan URL atau path sesuai dengan lokasi file PNG Anda
            iconSize: [26, 37], // Sesuaikan dengan ukuran ikon Anda
            iconAnchor: [10, 39],
            popupAnchor: [3, -34],
            shadowSize: [41, 41]
        });

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
                polylineWeight = 2;
            } else if (accuracy >= 20 && accuracy <= 50) {
                polylineWeight = 5;
            } else {
                polylineWeight = 10;
            }

            if (polylinePoints.length > 1) {
                var polyline = L.polyline(polylinePoints.slice(-2), {
                    color: polylineColor,
                    weight: polylineWeight,
                    opacity: 1.0,
                }).addTo(map);

                // Add popup with data
                var popupContent = "Speed: " + speed + " km/h<br>Accuracy: " + accuracy + " m";
                polyline.bindPopup(popupContent);
            }

            // Add markers for the initial and final points
            if (i === 0) {
                var marker = L.marker([lat, lng]).addTo(map);

                // Add popup with latitude and bounds information
                var markerPopupContent =
                    "<div style='max-width: 200px; overflow: hidden; text-overflow: ellipsis;'>" +
                    "<div style='font-size: 12px;'>" +
                    "Latitude: " + lat.toFixed(6) +
                    "<br>Longitude: " + lng.toFixed(6) +
                    "<br>Bounds: " + map.getBounds().toBBoxString() +
                    "</div>" +
                    "</div>";

                // Set the maxWidth option to control the maximum width of the popup
                var popupOptions = {
                    maxWidth: 200, // Adjust this value according to your needs
                };

                marker.bindPopup(markerPopupContent, popupOptions);
            } else if (i === historyData.length - 1) {
                var marker = L.marker([lat, lng], {
                    icon: customIcon
                }).addTo(map);

                // Add popup with latitude and bounds information
                var markerPopupContent =
                    "<div style='max-width: 200px; overflow: hidden; text-overflow: ellipsis;'>" +
                    "<div style='font-size: 12px;'>" +
                    "Latitude: " + lat.toFixed(6) +
                    "<br>Longitude: " + lng.toFixed(6) +
                    "<br>Bounds: " + map.getBounds().toBBoxString() +
                    "</div>" +
                    "</div>";

                // Set the maxWidth option to control the maximum width of the popup
                var popupOptions = {
                    maxWidth: 200, // Adjust this value according to your needs
                };

                marker.bindPopup(markerPopupContent, popupOptions);
            }
        }

        var allLatLngs = polylinePoints.concat(historyData.map(function(item) {
            var latlngStr = item.latlng;
            var latlngArr = latlngStr.split(", ");
            var lat = parseFloat(latlngArr[0]);
            var lng = parseFloat(latlngArr[1]);
            return L.latLng(lat, lng);
        }));

        map.fitBounds(L.latLngBounds(allLatLngs));

        // Adding a Polyline connecting the circle markers
        layerGroup.addTo(map);
    </script>
@endsection
