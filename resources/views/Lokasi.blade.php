<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <title>Document</title>
</head>
<body>
    <h1>jijdiod</h1>
    <div id="map" style="height: 400px;"></div>
</body>
<script>
    // Inisialisasi peta dengan koordinat dan level zoom yang menampilkan Bandung
    var mymap = L.map('map').setView([-6.914744, 107.609810], 12);

    // Tambahkan layer peta dari OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(mymap);

    // Tambahkan marker untuk Bandung
    L.marker([-6.914744, 107.609810]).addTo(mymap)
        .bindPopup('<b>Bandung</b><br>Known as the "Paris of Java"');
</script>

</html>
