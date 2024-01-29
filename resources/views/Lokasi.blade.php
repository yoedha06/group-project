@extends('layouts')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Peta</title>
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    </head>

    <body>

        <style>
            .map-controls {
                background-color: #f8f9fa;
                border: 1px solid #dee2e6;
                border-radius: 5px;
                padding: 10px;
                margin-bottom: 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }


            .map-controls input {
                padding: 8px;
                margin-right: 10px;
                border: 1px solid #ced4da;
                border-radius: 5px;
            }

            .map-controls button {
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .map-controls button.search {
                background-color: #007bff;
                color: white;
            }

            .map-controls button.filter-sudah {
                background-color: #28a745;
                color: white;
            }

            .map-controls button.filter-belum {
                background-color: #dc3545;
                color: white;
            }

            .map-controls button.reset {
                background-color: #007bff;
                color: white;
            }

            .map-controls button:hover {
                opacity: 0.8;
            }
        </style>
        <div class="map-container">
            <div class="map-controls">
                <div>
                    <input type="text" id="searchInput" placeholder="Cari Nama Pemilih">
                    <button class="search" onclick="searchByName()">Cari</button>
                </div>
                <div>
                    <button class="filter-sudah" onclick="filterMarkers('Sudah Memilih')">Sudah Memilih</button>
                    <button class="filter-belum" onclick="filterMarkers('Belum Memilih')">Belum Memilih</button>
                    <button class="reset" onclick="resetMarkers()">Lihat Semua</button>
                </div>
            </div>

            <div id="map" style="height: 600px"></div>

            <script>
                var pemilih = {!! json_encode($pemilih) !!};
                var map = L.map('map').setView([-6.895364793103795, 107.53971757412086], 13);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                var markers = [];

                function addMarker(p) {
                    var coordinates = p.koordinat.split(',').map(function(coord) {
                        return parseFloat(coord.trim());
                    });

                    var markerColor = p.status_pemilihan === 'Sudah Memilih' ? 'green' : 'red';

                    var marker = L.marker(coordinates, {
                        icon: L.divIcon({
                            className: 'custom-marker',
                            html: '<svg width="50" height="50" xmlns="http://www.w3.org/2000/svg">' +
                                '<path d="M12 0C5.37 0 0 5.37 0 12s12 24 12 24 12-10.8 12-24S18.63 0 12 0zm0 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z" fill="' +
                                markerColor + '"/></svg>',
                            iconSize: [15, 15],
                            iconAnchor: [15, 15],
                        })
                    }).addTo(map);


                    var popupContent = "<b>Nama Pemilih:</b> " + p.nama_pemilih + "<br><b>Status Pemilihan:</b> " + p
                        .status_pemilihan + "<br><b>Koordinat:</b> " + p.koordinat;
                    marker.bindPopup(popupContent).openPopup();

                    markers.push({
                        marker,
                        status: p.status_pemilihan,
                        nama: p.nama_pemilih
                    });
                }

                pemilih.forEach(function(p) {
                    addMarker(p);
                });

                function filterMarkers(status) {
                    markers.forEach(function(m) {
                        if (m.status === status) {
                            m.marker.addTo(map);
                        } else {
                            map.removeLayer(m.marker);
                        }
                    });
                }

                function resetMarkers() {
                    markers.forEach(function(m) {
                        m.marker.addTo(map);
                    });
                }

                function showLocationOnMap(latitude, longitude) {
                    map.setView([latitude, longitude], 13);
                }

                function searchByName() {
                    var searchValue = document.getElementById('searchInput').value.toLowerCase();
                    markers.forEach(function(m) {
                        if (m.nama.toLowerCase().includes(searchValue)) {
                            m.marker.addTo(map);
                        } else {
                            map.removeLayer(m.marker);
                        }
                    });
                }
            </script>
    </body>
    </html>
@endsection
