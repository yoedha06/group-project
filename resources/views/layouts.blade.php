<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Pemilu</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    {{-- Font & Icon CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-xwz5KD/WT06P4ATnA5ou22Ld9bpAjsEe+JykRQs4Mj47Ro9X1W9wCr/YQnNRvBwoQzN3eFiOSt5ZyZ5OL/kDgw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- link logo pemilu check --}}
    <link rel="icon" type="image/png" href="/assets/images/logo.png" />
    {{-- Link Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Custom CSS --}}
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="/assets/images/logo.png" />

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        #splash-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            perspective: 1000px;
        }

        #splash-content {
            text-align: center;
            animation: rotateLogo 2s infinite linear, moveUpAndDown 2s infinite alternate;
            transform-style: preserve-3d;
        }

        #myLordIcon {
            width: 250px;
            height: 250px;
            cursor: pointer;
            transform: translateZ(50px);
        }

        h2 {
            color: #000;
            font-size: 24px;
            margin-top: 20px;
        }

        @keyframes rotateLogo {
            0% {
                transform: rotateY(0deg);
            }

            100% {
                transform: rotateY(360deg);
            }
        }

        @keyframes moveUpAndDown {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(20px);
            }
        }
    </style>

</head>

<body>
    <!-- Splash Screen -->
    <div id="splash-screen">
        <div id="splash-content">
            <!-- Ganti konten lord-icon dengan gambar GIF -->
            <img src="https://cdn.kibrispdr.org/data/390/gambar-kartun-coblos-4.gif" alt="GIF Logo"
                style="width: 250px; height: 250px;" id="myLordIcon">

            <h2>Pemilu...</h2>
        </div>
    </div>

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
                    <a href="{{ route('hasilpemilihan.index') }}"><i class="bi bi-bar-chart"></i> Hasil Pemilihan</a>
                </li>
                <a href="{{ route('lokasi') }}">
                    <i class="bi bi-geo-alt"></i>Map
                </a>
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
    </div>

    <!-- Bootstrap JS and other scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Menunggu konten utama dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Menghilangkan splash screen setelah 1 detik
            setTimeout(function() {
                document.getElementById('splash-screen').style.display = 'none';
            }, 0);
        });
    </script>
</body>

</html>
