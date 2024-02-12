@extends('layouts')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* CSS for enhancing the appearance of small boxes */
        .small-box {
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            display: block;
            margin-bottom: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }

        .small-box:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .inner {
            padding: 10px;
        }

        .small-box .icon {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 0;
            font-size: 90px;
            color: rgba(0, 0, 0, 0.15);
        }

        .small-box .icon i {
            font-size: 50px;
        }

        .small-box p {
            color: #fff;
        }

        .small-box .small-box-footer {
            background: rgba(0, 0, 0, 0.1);
            color: #fff;
            display: block;
            padding: 3px 0;
            text-align: center;
            transition: all 0.3s ease;
        }

        .small-box:hover .small-box-footer {
            background: rgba(0, 0, 0, 0.3);
        }

        .small-box .small-box-footer:hover {
            color: #f4f4f4;
        }

        .small-box h3 {
            font-size: 38px;
            font-weight: bold;
            margin: 0;
        }

        .small-box p {
            font-size: 18px;
        }
    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active"><i class="fas fa-tachometer-alt"></i> Dashboard Admin</li>
                    </ol>


                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jumlah_pemilih }}</h3>
                            <p><b>Data Pemilih</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('pemilih.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $jumlah_kandidat }}</h3>
                            <p><b>Data Kandidat</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <a href="{{ route('kandidat.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $jumlah_hasil_pemilihan }}</h3>
                            <p><b>Data Hasil Pemilihan</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-vote-yea"></i>
                        </div>
                        <a href="{{ route('hasilpemilihan.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $title }}</h3>
                            <p><b>Map Pemilih</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-location-arrow"></i>
                        </div>
                        <a href="{{ route('pemilih.map') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
    </section>
    <div class="container py-4">

        <div class="p-6 m-20 bg-white rounded shadow">
            {!! $chart->container() !!}
        </div>

    </div>
    </div>

    <!-- LarapexCharts Script -->

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
@endsection
