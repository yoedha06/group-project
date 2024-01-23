{{-- Tag HTMl --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Pemilu</title>


    {{-- Link Bootstapppp --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Font  CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-xwz5KD/WT06P4ATnA5ou22Ld9bpAjsEe+JykRQs4Mj47Ro9X1W9wCr/YQnNRvBwoQzN3eFiOSt5ZyZ5OL/kDgw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- link logo pemilu check --}}
    <link rel="icon" type="image/png" href="/assets/images/logo.png" />
    {{-- Link Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/png" href="/assets/images/logo.png" />
    <!-- Link CSS -->
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
</head>
{{-- Bagian body --}}

<body>

    <lord-icon src="https://cdn.lordicon.com/kthelypq.json" trigger="hover"
        style="width:250px;height:250px;cursor:pointer;" id="myLordIcon">
    </lord-icon>
    </head>

    <body>

    </head>

    <body>
        {{-- CEPIIII --}}

        <div class="wrapper">
            <!-- Sidebar -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <img src="{{ asset('/assets/images/ppp-removebg-preview.png') }}" alt="Logo">
                    <h3>Pemilu</h3>

                </div>
                <ul class="list-unstyled">
                    <li class="{{ Request::is('pemilih*') ? 'active' : '' }}">
                        <a href="{{ route('pemilih.index') }}"><i class="bi bi-person"></i> Pemilih</a>
                    </li>
                    <li class="{{ Request::is('kandidat*') ? 'active' : '' }}">
                        <a href="{{ route('kandidat.index') }}"><i class="bi bi-person"></i> Kandidat</a>
                    </li>
                    <li class="{{ Request::is('partai_politik*') ? 'active' : '' }}">
                        <a href="{{ route('partai_politik.index') }}"><i class="bi bi-building"></i> Partai Politik</a>
                    </li>
                    <li class="{{ Request::is('hasilpemilihan*') ? 'active' : '' }}">
                        <a href="{{ route('hasilpemilihan.index') }}"><i class="bi bi-bar-chart"></i> Hasil
                            Pemilihan</a>
                    </li>
                    @if (!request()->has('keyword'))
                        <a href="{{ route('dashboard') }}" class="btn btn-danger btn-block mt-4"><i
                                class="bi bi-arrow-left-circle"></i> Back to Dashboard</a>
                    @endif
                </ul>
            </nav>

            <div class="container mt-5">
                {{-- content all --}}
                @yield('content')

            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
            </script>
            <!-- LInk Js -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>


                    <body>
                        <div class="wrapper">
                            <!-- Sidebar -->
                            <nav id="sidebar">
                                <div class="sidebar-header">
                                    <img src="{{ asset('/assets/images/ppp-removebg-preview.png') }}" alt="Logo">
                                    <h3>Pemilu</h3>
                                </div>
                                <ul class="list-unstyled">
                                    <li class="{{ Request::is('pemilih*') ? 'active' : '' }}">
                                        <a href="{{ route('pemilih.index') }}"><i class="bi bi-person"></i> Pemilih</a>
                                    </li>
                                    <li class="{{ Request::is('kandidat*') ? 'active' : '' }}">
                                        <a href="{{ route('kandidat.index') }}"><i class="bi bi-person"></i>
                                            Kandidat</a>
                                    </li>
                                    <li class="{{ Request::is('partai_politik*') ? 'active' : '' }}">
                                        <a href="{{ route('partai_politik.index') }}"><i class="bi bi-building"></i>
                                            Partai Politik</a>
                                    </li>
                                    <li class="{{ Request::is('hasilpemilihan*') ? 'active' : '' }}">
                                        <a href="{{ route('hasilpemilihan.index') }}"><i class="bi bi-bar-chart"></i>
                                            Hasil
                                            Pemilihan</a>
                                    </li>
                                    @if (!request()->has('keyword'))
                                        <a href="{{ route('dashboard') }}" class="btn btn-danger btn-block mt-4"><i
                                                class="bi bi-arrow-left-circle"></i> Back to Dashboard</a>
                                    @endif
                                </ul>
                            </nav>

                            <div class="container mt-5">
                                {{-- content all --}}
                                @yield('content')

                            </div>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
                                integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
                            </script>
                            <!-- LInk Js -->
                            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                    </body>
                    {{-- Penutup Body --}}


</html>
