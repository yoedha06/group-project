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

            .map-controls div label {
                display: flex;
                align-items: center;
                margin-right: 15px;
                cursor: pointer;
            }

            .map-controls div label input {
                margin-right: 8px;
            }

            .map-controls div label span {
                font-size: 16px;
            }

            .map-controls div label:hover {
                text-decoration: underline;
            }

            #validationMessage {
                display: none;
                margin-top: 10px;
                padding: 10px;
                border: 2px solid #d9534f;
                /* Warna border untuk pesan error */
                border-radius: 5px;
                color: #d9534f;
                /* Warna teks untuk pesan error */
                background-color: #f2dede;
                /* Warna latar belakang untuk pesan error */
            }

            #validationMessage.success {
                border-color: #5bc0de;
                /* Warna border untuk pesan sukses */
                color: #5bc0de;
                /* Warna teks untuk pesan sukses */
                background-color: #d9edf7;
                /* Warna latar belakang untuk pesan sukses */
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
        
            <div id="validationMessage" style="display: none; color: red; margin-top: 10px;"></div>
            <br>
            <div id="map" style="height: 600px"></div>
        
            {{-- script js maps --}}
            <script>
                var pemilih = {!! json_encode($pemilih) !!};
                var map;
                var markers = [];
                var currentFilter = ''; // Variabel untuk menyimpan status pemilihan yang sedang di-filter
            
                function calculateBounds() {
                    var bounds = new L.LatLngBounds();
            
                    markers.forEach(function(m) {
                        bounds.extend(m.marker.getLatLng());
                    });
            
                    return bounds;
                }
            
                function setupMap() {

                    var maxBounds = [
                        [-10, 95], // Koordinat sudut barat daya (SW)
                        [5, 150]   // Koordinat sudut timur laut (NE)
                    ];

                    map = L.map('map', {
                        center: [-2.5489, 118.0149],
                        zoom: 5,
                        maxBounds: maxBounds,  // Mengatur batas maksimum peta
                        maxBoundsViscosity: 0.9,  // Kontrol kekenyalan ketika melampaui batas
                        dragging: true,  // Aktifkan fungsi geser peta
                    });
            
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);
            
                    pemilih.forEach(function(p) {
                        addMarker(p);
                    });
            
                    // Setelah menambahkan semua marker, atur tampilan peta agar mencakup semua marker
                    var bounds = calculateBounds();
                    map.fitBounds(bounds);
                }
            
                function addMarker(p) {
                    if (p.nama_pemilih && p.status_pemilihan && p.koordinat) {
                        var coordinates = p.koordinat.split(',').map(function(coord) {
                            return parseFloat(coord.trim());
                        });
            
                        // Validasi koordinat
                        if (!isNaN(coordinates[0]) && !isNaN(coordinates[1])) {
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
                                .status_pemilihan +
                                "<br><b>Koordinat:</b> " + p.koordinat;
                            marker.bindPopup(popupContent).openPopup();
            
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
            
                function filterMarkers(status) {
                    currentFilter = status; 
                    markers.forEach(function(m) {
                        if (m.status === status) {
                            m.marker.addTo(map);
                        } else {
                            map.removeLayer(m.marker);
                        }
                    });
                }
            
                function resetMarkers() {
                    currentFilter = ''; // Reset variabel currentFilter
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
            
                    markers.forEach(function(m) {
                        if ((m.nama.toLowerCase().includes(searchValue) || searchValue === '') &&
                            (currentFilter === '' || m.status === currentFilter)) {
                            m.marker.addTo(map);
                            searchDataFound = true; // Setel ke true jika ada data yang ditemukan
            
                            var coordinates = m.marker.getLatLng();
                            map.flyTo(coordinates, 17, {
                                duration: 8 // Anda dapat menyesuaikan durasi (dalam detik) sesuai kebutuhan
                            });
                        } else {
                            map.removeLayer(m.marker);
                        }
                    });
            
                    if (!searchDataFound) {
                        document.getElementById('validationMessage').innerText = "Data Belum Memilih.";
                        document.getElementById('validationMessage').style.display = 'block';
                    } else {
                        // Sembunyikan pesan validasi jika ada data yang ditemukan
                        document.getElementById('validationMessage').style.display = 'none';
            
                        // Tampilkan pesan validasi bahwa data ditemukan
                        document.getElementById('validationMessage').innerText = "Data ditemukan!";
                        document.getElementById('validationMessage').style.color = 'green';
                        document.getElementById('validationMessage').style.display = 'block';
                    }
                }
                document.addEventListener('DOMContentLoaded', function() {
                    setupMap();
                });
            </script>
        </div> 
    </body>
    </html>
@endsection
