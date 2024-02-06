@extends('layouts')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Pemilih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@section('content')
    <div class="container mt-4">
        <center>
            <h1>Pemilu</h1>
        </center>
        <h2>Pemilih</h2>

        {{-- Add Pemilih Button --}}
        @if (auth()->user()->role === 'admin')
            <div class="d-flex">
                <a href="{{ route('pemilih.create') }}" class="btn btn-success mb-3"><i class="bi bi-plus-lg"></i> Tambah Pemilih</a>&nbsp;
                <button class="btn btn-danger btn-xs removeAll mb-3">Remove All Selected Data</button>   
            </div>
        @endif       

        {{-- Search Form --}}
        <form action="{{ route('pemilih.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="keyword" style="border-radius: 7px;"
                    placeholder="Cari pemilih...">&nbsp;
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i> Cari</button>
                </div>
            </div>
        </form>

        {{-- Success Message --}}
        @if ($message = session('berhasil'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="submit" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Pemilih Table --}}
        <table class="table table-bordered table-striped" style="margin-top: 10px;">
            <thead style="text-align: center;">
                <tr>
                    @if (auth()->user()->role === 'admin')
                    <th style="text-align: left;"><input type="checkbox" id="checkboxesMain"></th>
                    @endif
                    <th>No</th>
                    <th>Nama Pemilih</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Koordinat</th>
                    <th>No KTP</th>
                    <th>Status Pemilihan</th>
                    @if (auth()->user()->role === 'admin')
                        <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @if (count($pemilih) > 0)
                    @if($pemilih->count())
                        @foreach ($pemilih as $key => $p)
                        <tr id="tr_{{$p->Id_pemilih}}">
                            @if (auth()->user()->role === 'admin')
                                <td><input type="checkbox" class="checkbox" data-id="{{$p->Id_Pemilih}}"></td>
                            @endif
                                <td>{{ ++$key }}</td>
                                <td>{{ $p->nama_pemilih }}</td>
                                <td>{{ $p->tanggal_lahir }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td style="width:100px;">{{ $p->koordinat }}</td>
                                <td>{{ $p->no_ktp }}</td>
                                <td>
                                    <span class="badge {{ $p->status_pemilihan == 'Sudah Memilih' ? 'bg-success' : 'bg-danger' }}">
                                        {{ $p->status_pemilihan }}
                                    </span>
                                </td>
                                @if (auth()->user()->role === 'admin')
                                    <td>
                                        
                                            {{-- Edit Button --}}
                                            <a href="{{ route('pemilih.edit', $p->Id_Pemilih) }}" class="btn btn-warning"><i
                                                    class="bi bi-pencil-square"></i> Edit</a>

                                            {{-- Delete Form --}}
                                            <form id="deleteForm-{{ $p->Id_Pemilih }}"
                                                action="{{ route('pemilih.delete', $p->Id_Pemilih) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger"
                                                    onclick="confirmDelete('{{ $p->Id_Pemilih }}')"><i
                                                        class="bi bi-trash3-fill"></i> Hapus</button>
                                            </form>
                                        {{-- JavaScript Confirm Delete --}}
                                        <script>
                                            function confirmDelete(Id_Pemilih) {
                                                if (confirm("Apakah Anda yakin ingin menghapus pemilih ini?")) {
                                                    document.getElementById('deleteForm-' + Id_Pemilih).submit();
                                                } else {
                                                    alert("Penghapusan pemilih dibatalkan.");
                                                }
                                            }
                                        </script>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    @endif
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
        {{-- Back Button --}}
        @if (request()->has('keyword') && isset($pemilih) && count($pemilih) > 0)
            <a href="{{ url()->previous() }}" class="btn btn-success btn-sm mt-3">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        @endif

        {{-- JavaScript Checkbox --}}
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
        <script type = "text/javascript" >
            $(document).ready(function() {
                $('#checkboxesMain').on('click', function(e) {
                    if ($(this).is(':checked', true)) {
                        $(".checkbox").prop('checked', true);
                    } else {
                        $(".checkbox").prop('checked', false);
                    }
                });
                $('.checkbox').on('click', function() {
                    if ($('.checkbox:checked').length == $('.checkbox').length) {
                        $('#checkboxesMain').prop('checked', true);
                    } else {
                        $('#checkboxesMain').prop('checked', false);
                    }
                });
                $('.removeAll').on('click', function(e) {
                    var userIdArr = [];
                    $(".checkbox:checked").each(function() {
                        userIdArr.push($(this).attr('data-id'));
                    });
                    if (userIdArr.length <= 0) {
                        alert("Choose min one item to remove.");
                    } else {
                        if (confirm("Are you sure you want to delete")) {
                            var stuId = userIdArr.join(",");
                            $.ajax({
                                url: "{{url('delete-all')}}",
                                type: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: 'ids=' + stuId,
                                success: function(data) {
                                    if (data['status'] == true) {
                                        $(".checkbox:checked").each(function() {
                                            $(this).parents("tr").remove();
                                        });
                                        alert(data['message']);
                                    } else {
                                        alert('Error occured.');
                                    }
                                },
                                error: function(data) {
                                    alert(data.responseText);
                                }
                            });
                        }
                    }
                });
            }); 
        </script>
    </div>
@endsection

        {{-- Pagination Links
        <div class="flex justify-content-center">
            {{ $pemilih->links('pagination::bootstrap-5') }}
        </div> --}}
