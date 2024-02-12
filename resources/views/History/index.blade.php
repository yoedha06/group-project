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
        <ol class="breadcrumb float-sm-right" style="padding-top: 10px;">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item active"><i class="fas fa-history"></i> History</li>
        </ol>


        <div class="d-flex ">
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('history.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> Tambah </a>
                &nbsp;
            @endif
            <a href="{{ route('history.map') }}" class="btn btn-warning"> <i class="bi bi-geo"></i>Map History</a>
        </div>



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
                    @if (auth()->user()->role === 'admin')
                        <th>action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @if (count($history) > 0)
                    @foreach ($history as $h)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td width="150px;">{{ $h->latlng }}</td>
                            <td>{{ $h->bounds }}</td>
                            <td>{{ $h->accuracy }}</td>
                            <td>{{ $h->altitude }}</td>
                            <td>{{ $h->altitude_acuracy }}</td>
                            <td>{{ $h->heading }}</td>
                            <td>{{ $h->speeds }}</td>
                            <td width="200px;">{{ $h->created_at }} - {{ $h->updated_at }}</td>
                            @if (auth()->user()->role === 'admin')
                                <td>
                                    <a href="{{ route('history.edit', $h->id) }}" class="btn btn-warning"><i
                                            class="bi bi-pencil-square">&nbsp;</i>Edit</a>
                                    <form action="{{ route('history.destroy', $h->id) }}" method="post"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger"onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i
                                                class="bi bi-trash3-fill"></i> Hapus</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="text-center">
                            <i class="bi bi-emoji-dizzy" style="font-size: 4rem;"></i>
                            <p class="mt-2">Tidak ada data, maaf.</p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $history->links('pagination::bootstrap-5') }}
        </div>
        </div>
    </body>
@endsection
