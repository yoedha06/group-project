@extends('layouts')
<title>Tambah History</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top:40px;">
                    <div class="card-header">Tambah Maps history</div>

                    <div class="card-body">
                        <form action="{{ route('history.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="latlng">latlng</label>
                                <input type="text" name="latlng" id="latlng" class="form-control {{ $errors->has('latlng') ? 'is-invalid' : '' }}" value="{{ old('latlng') }}">
                                @error('latlng')
                                    <div class="invalid-feedback">{{$massage}}</div>
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
                                <label for="altitude_accuracy">altitude_accuracy</label>
                                <input type="number" name="altitude_accuracy" id="altitude_accuracy" class="form-control {{ $errors->has('altitude_accuracy') ? 'is-invalid' : '' }}" value="{{ old('altitude_accuracy') }}">
                                @error('altitude_accuracy')
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
