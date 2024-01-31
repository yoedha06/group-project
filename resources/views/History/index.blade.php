@extends('layouts')

@section('content')
    <div class="container mt-4">
        <center>
            <h1>Pemilu</h1>
        </center>
        <h2>History</h2>

        <div class="mb-3">
                <a href="{{ route('history.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> Tambah </a>
        </div>

        {{-- Success Message --}}
        @if ($message = session('berhasil'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

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
                        <td>{{ $h->created_at }} - {{ $h->updated_at }}</td>
                        <td width="170px">
                            <a href="{{ route('history.edit', $h->id ) }}" class="btn btn-warning"><i
                                    class="bi bi-pencil-square">&nbsp;</i>Edit</a>
                            <form action="{{ route('history.destroy', $h->id) }}" method="post"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection