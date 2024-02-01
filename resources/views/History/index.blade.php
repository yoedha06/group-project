@extends('layouts')
<title>Peta</title>
{{--  --}}

<head>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    {{-- <link rel="stylesheet" href=" http://127.0.0.1:8000/history/marker-icon.png"> --}}
    {{-- <link rel="stylesheet" href="'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css'"> --}}
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
</head>
@section('content')

    <body>
        <div class="container mt-4">
            <center>
                <h1>Pemilu</h1>
            </center>
            <h2>History</h2>

            <div class="mb-3">
                <a href="{{ route('history.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> Tambah </a>
            </div>
            {{-- history --}}

            <table class="table table-bordered table-striped" style="margin-top: 10px;">
                <thead style="text-align: center;">
                    <tr>
                        <th>No</th>
                        <th>latlng</th>
                        <th>bounds</th>
                        <th>accuracy</th>
                        <th>altitude</th>
                        <th>altitude_accuracy</th>
                        <th>heading</th>
                        <th>speeds</th>
                        <th>timestamp</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $h)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $h->latlng }}</td>
                            <td>{{ $h->bounds }}</td>
                            <td>{{ $h->accuracy }}</td>
                            <td>{{ $h->altitude }}</td>
                            <td>{{ $h->altitude_acuracy }}</td>
                            <td>{{ $h->heading }}</td>
                            <td>{{ $h->speeds }}</td>
                            <td width="400px;">{{ $h->created_at }} - {{ $h->updated_at }}</td>
                            <td>
                                <a href="{{ route('history.edit', $h->id) }}" class="btn btn-warning"><i
                                        class="bi bi-pencil-square">&nbsp;</i>Edit</a>
                                <form action="{{ route('history.destroy', $h->id) }}" method="post"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-danger"onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('history.map') }}" class="btn btn-success">Map</a>
        </div>
    </body>
@endsection
