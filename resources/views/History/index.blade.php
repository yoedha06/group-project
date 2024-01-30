@extends('layouts')

@section('content')
    <div class="container mt-4">

        {{-- Pemilih h --}}
        <table class="table table-bordered table-striped" style="margin-top: 10px;">
            <thead style="text-align: center;">
                <tr>
                    <th>No</th>
                    <th>id</th>
                    <th>Start </th>
                    <th>End </th>
                    <th>Speed</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($history as $h)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $h->id }}</td>
                        <td>{{ $h->koordinat_start }}</td>
                        <td>{{ $h->koordinat_end }}</td>
                        <td>{{ $h->speeds }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination Links --}}
        {{-- <div class="flex justify-content-center">
            {{ $pemilih->links('pagination::bootstrap-5') }}
        </div> --}}

        {{-- Back Button --}}
        @if (request()->has('keyword') && isset($history) && count($history) > 0)
            <a href="{{ url()->previous() }}" class="btn btn-success btn-sm mt-3">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        @endif
    </div>
@endsection
