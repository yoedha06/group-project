@extends('layouts')
@section('content')
    <!DOCTYPE html>
    <html>
    <head>
        <title>Peta</title>
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-locatecontrol/0.74.0/L.Control.Locate.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-locatecontrol/0.74.0/L.Control.Locate.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/lokasi.css') }}">
    </head>

    <body>
        <div class="map-container" style="margin-top:10px;">
            
            <div class="map-controls" style="border-radius: 10px;">
                <div>
                    <input type="text" id="searchInput" placeholder="Cari Nama Pemilih" >
                    <button class="search" onclick="searchByName()">Cari</button>
                </div>
                <div>
                    <button class="reset" onclick="resetMarkers()">Lihat Semua</button>
                    <button class="filter-sudah" onclick="filterMarkersByStatus('Sudah Memilih')">Sudah Memilih</button>
                    <button class="filter-belum" onclick="filterMarkersByStatus('Belum Memilih')">Belum Memilih</button>
                </div>
            </div>

            <div id="validationMessage" style="display: none; color: red; margin-top: 10px;"></div>
            <div id="map" style="height: 630px; border-radius:15px;"></div>
        </div>
    </body>
        <script>
            var pemilih = {!! json_encode($pemilih) !!};
            var map = L.map('map').setView([-6.895364793103795,  107.53971757412086],  13);
            var markers = [];
            var currentFilter = '';
            var bounds;

            //kontrol lokasi terkini
            var lc = L.control.locate({
                icon: 'fa fa-location-arrow', // Font Awesome class for the icon
                position: 'topleft', // Posisi tempat Anda ingin kontrol muncul
                drawCircle: true, // Apakah harus menggambar lingkaran di sekitar lokasi pengguna
                follow: true, // Apakah harus memindahkan tampilan peta ke lokasi pengguna
                stopFollowingOnDrag: true, // Hentikan pelacakan saat peta digeser
                remainingTime:  30, // Waktu dalam detik sebelum otomatis berhenti
                markerStyle: {
                    // Gaya kustom untuk penanda
                    color: '#136aec',
                    fillColor: '#2a9fd6',
                    fillOpacity:  0.6,
                    weight:  2,
                    opacity:  0.8,
                    radius:  12
                },
                circleStyle: {
                    // Gaya kustom untuk lingkaran akurasi
                    color: '#136aec',
                    fillColor: '#1976d2',
                    fillOpacity:  0.5,
                    weight:  1,
                    opacity:  0.8
                },
                metric: true, // Gunakan satuan metrik
                strings: {
                    title: "Tunjukkan lokasi saya", // Judul untuk tombol kontrol lokasi
                    popup: "Anda berada dalam {distance} {unit} dari titik ini", // Teks untuk label popup
                    outsideMapBoundsMsg: "Sepertinya Anda berada di luar batas peta" // Pesan yang ditampilkan jika pengguna berada di luar batas peta
                },
                locateOptions: {
                    enableHighAccuracy: true // Meminta akurasi tinggi dari perangkat
                },
                flyTo: true
            }).addTo(map);

            L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }

            function showPosition(position) {

                var lat = position.coords.latitude;
                var lon = position.coords.longitude;

                var currentLocationMarker = L.marker([lat, lon]).addTo(map);

                currentLocationMarker.bindPopup("Lokasi Anda");

                currentLocationMarker.openPopup();

                L.circle([lat, lon], {
                    color: 'blue',
                    fillColor: '#00f',
                    fillOpacity:  0.3,
                    radius:  300 
                }).addTo(map);

            }

            function showError(error) {
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        alert("maaf izin lokasi ditolak,buka pengaturan untuk mengizinkan lokasi.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        alert("Informasi lokasi tidak tersedia.");
                        break;
                    case error.TIMEOUT:
                        alert("Permintaan untuk mendapatkan lokasi pengguna telah habis waktu.");
                        break;
                    case error.UNKNOWN_ERROR:
                        alert("Terjadi kesalahan yang tidak dikenal.");
                        break;
                }
            }

            function setupMap() {
                pemilih.forEach(function(p) {
                    addMarker(p);
                });

                bounds = new L.LatLngBounds(markers.map(marker => marker.marker.getLatLng()));
                map.fitBounds(bounds, { padding: [50, 50] });
            }
            
            function addMarker(p) {
                if (p.nama_pemilih && p.status_pemilihan && p.koordinat) {
                    var coordinates = p.koordinat.split(',').map(function(coord) {
                        return parseFloat(coord.trim());
                    });

                    if (!isNaN(coordinates[0]) && !isNaN(coordinates[1])) {
                        var markerColor = p.status_pemilihan === 'Sudah Memilih' ? 'green' : 'red';

                        var marker = L.marker(coordinates, {
                            icon: L.divIcon({
                                className: 'custom-marker',
                                html: '<svg width="50" height="50" xmlns="http://www.w3.org/2000/svg">' +
                                    '<path d="M12 0C5.32 0 0 5.37 0 12s12 24 12 24 12-10.8 12-24S18.63 0 12 0zm0 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z" fill="' +
                                    markerColor + '"/></svg>',
                                iconSize: [15, 15],
                                iconAnchor: [15, 15],
                            })
                        }).addTo(map);

                        var popupContent = "<b>Nama Pemilih:</b> " + p.nama_pemilih + "<br><b>Status Pemilihan:</b> " + p
                            .status_pemilihan +
                            "<br><b>Koordinat:</b> " + p.koordinat;
                        marker.bindPopup(popupContent);

                        markers.push({
                            marker,
                            status: p.status_pemilihan,
                            nama: p.nama_pemilih
                        });
                    } else {
                        console.warn("Data koordinat tidak valid untuk pemilih:", p);
                    }
                } else {
                    console.warn("Data pemilih tidak lengkap atau tidak valid:", p);
                }
            }

            pemilih.forEach(function(p) {
                addMarker(p);
            });

            function filterMarkersByStatus(status) {
                currentFilter = status;

                markers.forEach(function(m) {
                    if (m.status === status || status === 'Semua') {
                        m.marker.addTo(map);
                    } else {
                        map.removeLayer(m.marker);
                    }
                });
            }

            function resetMarkers() {
                currentFilter = '';

                markers.forEach(function(m) {
                    m.marker.addTo(map);
                });
            }

            function showLocationOnMap(latitude, longitude) {
                map.setView([latitude, longitude], 13);
            }

            function searchByName() {
                var searchValue = document.getElementById('searchInput').value.toLowerCase();
                var searchDataFound = false;
                var isDataSelected = false;

                markers.forEach(function(m) {
                    if ((m.nama.toLowerCase().includes(searchValue) || searchValue === '') &&
                        (currentFilter === '' || m.status === currentFilter)) {
                        m.marker.addTo(map);
                        searchDataFound = true;

                        if (m.status === 'Sudah Memilih') {
                            isDataSelected = true;
                        }

                        var coordinates = m.marker.getLatLng();
                        map.flyTo(coordinates, 17, {
                            duration: 3
                        });
                        m.marker.openPopup();

                        markers.forEach(function(marker) {
                            if (marker.nama === m.nama && marker.marker !== m.marker) {
                                marker.marker.addTo(map);
                            }
                        });
                    } else {
                        map.removeLayer(m.marker);
                    }
                });

                if (!searchDataFound) {
                    document.getElementById('validationMessage').innerText =
                        currentFilter === '' ? "Data not found." : "No matching data for the selected filter.";
                    document.getElementById('validationMessage').style.display = 'block';
                } else {
                    document.getElementById('validationMessage').style.display = 'none';

                    document.getElementById('validationMessage').innerText =
                        isDataSelected ? "Selected data found!" : "Data found!";
                    document.getElementById('validationMessage').style.color = 'green';
                    document.getElementById('validationMessage').style.display = 'block';
                }
            }
            setupMap();
        </script>
    </html>
@endsection
