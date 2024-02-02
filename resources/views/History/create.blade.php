@extends('layouts')
<title>Tambah History</title>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>
<script src="https://unpkg.com/leaflet-geolocation@4.2.0/dist/leaflet-geolocation.js"></script>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top:40px;">
                    <div class="card-header">Tambah Maps history</div>

                    <div class="card-body">
                        <form action="{{ route('history.store') }}" method="POST">
                            @csrf
                            <div id="map" style="height:300px;"></div>
                            
                            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
                            
                            <script>
                                var map = L.map('map').setView([0, 0], 2);
                            
                                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                }).addTo(map);
                            
                                var marker = L.marker([0, 0], { draggable: true }).addTo(map);
                            
                                function getLocation() {
                                    if (navigator.geolocation) {
                                        navigator.geolocation.getCurrentPosition(showPosition, showError);
                                    } else {
                                        alert("Geolocation is not supported by this browser.");
                                    }
                                }
                            
                                function showPosition(position) {
                                    var lat = position.coords.latitude;
                                    var lng = position.coords.longitude;
                            
                                    // Update map to the user's current location
                                    map.setView([lat, lng], 15);
                            
                                    // Update marker position
                                    marker.setLatLng([lat, lng]);
                            
                                    // Update input latlng value
                                    document.getElementById('latlng').value = lat + ', ' + lng;
                            
                                    // Add a popup to the marker indicating the current location
                                    marker.bindPopup('Lokasi Terkini').openPopup();
                                }
                            
                                function showError(error) {
                                    switch (error.code) {
                                        case error.PERMISSION_DENIED:
                                            alert("Geolocation permission denied by user.");
                                            break;
                                        case error.POSITION_UNAVAILABLE:
                                            alert("Location information is unavailable.");
                                            break;
                                        case error.TIMEOUT:
                                            alert("Geolocation request timed out.");
                                            break;
                                        case error.UNKNOWN_ERROR:
                                            alert("An unknown error occurred.");
                                            break;
                                    }
                                }
                            
                                // Call getLocation function when the page loads
                                window.onload = getLocation;
                            
                                // Update marker position and input value when marker is dragged
                                marker.on('dragend', function (event) {
                                    var markerLatLng = marker.getLatLng();
                                    document.getElementById('latlng').value = markerLatLng.lat + ', ' + markerLatLng.lng;
                                });
                            </script>
                            
                            <br>
                            <div class="form-group">
                                <label for="latlng">latlng</label>
                                <input type="text" name="latlng" id="latlng" class="form-control {{ $errors->has('latlng') ? 'is-invalid' : '' }}" value="{{ old('latlng') }}">
                                @error('latlng')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="bounds">bounds</label>
                                <input type="text" name="bounds" id="bounds" class="form-control {{ $errors->has('bounds') ? 'is-invalid' : '' }}" value="{{ old('bounds') }}">
                                @error('bounds')
                                    <div class="invalid-feedback">{{$massage}}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="accuracy">accuracy</label>
                                <input type="number" name="accuracy" id="accuracy" class="form-control {{ $errors->has('accuracy') ? 'is-invalid' : '' }}" value="{{ old('accuracy') }}">
                                @error('accuracy')
                                    <div class="invalid-feedback">{{$massage}}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="altitude">altitude</label>
                                <input type="number" name="altitude" id="altitude" class="form-control {{ $errors->has('altitude') ? 'is-invalid' : '' }}" value="{{ old('altitude') }}">
                                @error('altitude')
                                    <div class="invalid-feedback">{{$massage}}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="altitude_acuracy">altitude_accuracy</label>
                                <input type="number" name="altitude_acuracy" id="altitude_acuracy" class="form-control {{ $errors->has('altitude_acuracy') ? 'is-invalid' : '' }}" value="{{ old('altitude_acuracy') }}">
                                @error('altitude_acuracy')
                                    <div class="invalid-feedback">{{$massage}}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="heading">heading</label>
                                <input type="number" name="heading" id="heading" class="form-control {{ $errors->has('heading') ? 'is-invalid' : '' }}" value="{{ old('heading') }}">
                                @error('heading')
                                    <div class="invalid-feedback">{{$massage}}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="speeds">speeds</label>
                                <input type="number" name="speeds" id="speeds" class="form-control {{ $errors->has('speeds') ? 'is-invalid' : '' }}" value="{{ old('speeds') }}">
                                @error('speeds')
                                    <div class="invalid-feedback">{{$massage}}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Tambah Pemilih</button>
                                <a href="{{ route('history.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
