@extends('layouts')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Peta</title>
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
        <script src="https://unpkg.com/@geoman-io/leaflet-history-control"></script>

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

            {{-- script js maps --}}
            <script>
                var pemilih = {!! json_encode($pemilih) !!};
                var map = L.map('map').setView([-6.895364793103795, 107.53971757412086], 13);

                var coordinates = pemilih.map(function(p) {
                    var coords = p.koordinat.split(',').map(parseFloat);
                    return new L.LatLng(coords[0], coords[1]);
                });

                // var polyline = L.polyline(coordinates, {
                //     color: 'blue'
                // }).addTo(map);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
                var markers = [];
                var currentFilter = ''; // Variabel untuk menyimpan status pemilihan yang sedang di-filter

                function calculateBounds() {
                    var bounds = new L.LatLngBounds();

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

                var map = L.map('map').setView([51.505, -0.09], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                }).addTo(map);

                var historyControl = new L.HistoryControl();
                map.addControl(historyControl);

                var routingControl = L.Routing.control({
                    waypoints: coordinates.map(function(coord) {
                        return L.latLng(coord.lat, coord.lng);
                    }),
                    createMarker: function(i, wp, nWps) {
                        if (i === 0 || i === nWps - 1) {
                            return L.marker(wp.latLng, {
                                icon: L.divIcon({
                                    className: 'custom-marker',
                                    html: '<svg width="50" height="50" xmlns="http://www.w3.org/2000/svg">' +
                                        '<path d="M12 0C5.37 0 0 5.37 0 12s12 24 12 24 12-10.8 12-24S18.63 0 12 0zm0 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z" fill="' +
                                        (wp.options.status === 'Sudah Memilih' ? 'green' : 'red') +
                                        '"/></svg>',
                                    iconSize: [15, 15],
                                    iconAnchor: [15, 15],
                                })
                            });
                        } else {
                            return null;
                        }
                    },
                    lineOptions: {
                        styles: [{
                            color: 'green',
                            opacity: 1,
                            weight: 3.5
                        }]
                    }
                }).addTo(map);

                function filterMarkers(status) {
                    currentFilter = status;
                    var filteredMarkers = markers.filter(function(m) {
                        return m.status === status;
                    });

                    // Menampilkan atau menyembunyikan pesan validasi
                    var validationMessage = document.getElementById('validationMessage');
                    if (filteredMarkers.length === 0) {
                        validationMessage.innerText = "Data Tidak Ditemukan.";
                        validationMessage.style.color = 'red';
                        validationMessage.style.display = 'block';
                    } else {
                        validationMessage.style.display = 'none';
                    }

                    // Menambahkan atau menghapus marker sesuai filter
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
                    var searchDataFound = false;
                    var isDataSelected = false;
                    markers.forEach(function(m) {
                        if ((m.nama.toLowerCase().includes(searchValue) || searchValue === '') &&
                            (currentFilter === '' || m.status === currentFilter)) {
                            m.marker.addTo(map);
                            searchDataFound = true; // Setel ke true jika ada data yang ditemukan
                            if (m.status === 'Sudah Memilih') {
                                isDataSelected = true; // Setel ke true jika ada data yang sudah memilih
                            }                            var coordinates = m.marker.getLatLng();
                            map.flyTo(coordinates, 17, {
                                duration: 2 // Anda dapat menyesuaikan durasi (dalam detik) sesuai kebutuhan
                            });
                        } else {
                            map.removeLayer(m.marker);
                        }
                    });
                    // Menampilkan atau menyembunyikan pesan validasi
                    var validationMessage = document.getElementById('validationMessage');
                    if (!searchDataFound) {
                        validationMessage.innerText = "Data Tidak Ditemukan.";
                        validationMessage.style.color = 'red';
                        validationMessage.style.display = 'block';
                    } else {

                        validationMessage.innerText = "Data Ditemukan!";
                        validationMessage.style.color = 'green';
                        validationMessage.style.display = 'block';

                        // Sembunyikan pesan validasi jika ada data yang ditemukan
                        document.getElementById('validationMessage').style.display = 'none';

                        // Tampilkan pesan validasi bahwa data ditemukan
                        document.getElementById('validationMessage').innerText = "Data ditemukan!";
                        document.getElementById('validationMessage').style.color = 'green';
                        document.getElementById('validationMessage').style.display = 'block';

                    }
                }


                function filterMarkers(status) {
                    currentFilter = status;
                    var filterDataFound = false; // Tandai apakah data sesuai dengan filter

                    markers.forEach(function(m) {
                        if (m.nama.toLowerCase().includes(searchValue)) {
                            m.marker.addTo(map);
                        } else {
                            map.removeLayer(m.marker);
                        }
                    });
                }
            </script>

        </div>
    </body>


    </html>
@endsection
