@extends('layouts')
<!DOCTYPE html>
@section('content')
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit maps</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                <div class="card bt-3">
                    <div class="card-header">Edit maps</div>

                    <div class="card-body">
                        <form action="{{ route('history.update', $history->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="latlng">latlng :</label>
                                <input type="text" name="latlng" id="latlng" class="form-control"
                                value="{{ $history->latlng }}">
                                @error('latlng')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="bounds">bounds :</label>
                                <input type="text" name="bounds" id="bounds" class="form-control {{ $errors->has('bounds') ? 'is-invalid' : '' }}"
                                value="{{ $history->bounds }}">
                                @error('bounds')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="accuracy">accuracy :</label>
                                <input type="number" name="accuracy" id="accuracy" class="form-control {{ $errors->has('accuracy') ? 'is-invalid' : '' }}"
                                value="{{ $history->accuracy }}">
                                @error('accuracy')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="altitude">altitude :</label>
                                <input type="number" name="altitude" id="altitude" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}"
                                value="{{ $history->altitude }}">
                                @error('altitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="altitude_acuracy">altitude acuracy :</label>
                                <input type="number" name="altitude_acuracy" id="altitude_acuracy"
                                    class="form-control {{ $errors->has('altitude_acuracy') ? 'is-invalid' : '' }}"
                                    value="{{ $history->altitude_acuracy }}">
                                @error('altitude_acuracy')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="heading">heading :</label>
                                <input type="number" name="heading" id="heading" class="form-control {{ $errors->has('heading') ? 'is-invalid' : '' }}"
                                    value="{{ $history->heading }}">
                                @error('heading')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="speeds">speeds :</label>
                                <input type="number" name="speeds" id="speeds" class="form-control {{ $errors->has('speeds') ? 'is-invalid' : '' }}"
                                    value="{{ $history->speeds }}">
                                @error('speeds')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ route('pemilih.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</script>
</html>
@endsection
