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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-H+2SyFiX9xT8BpsjUVm5+cWJiBuK2F/QtyWngPgzXLt6tiEn1B7P6KXSN2OiYpdYs7z3mnu+GlkRdQl+EZ6+FA=="
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
            overflow-x: hidden;
            /* Hide horizontal scrollbar */
            transition: background-color 0.5s;
            /* Add transition effect for background color change */
        }

        body.dark-mode {
            background-color: #343a40;
            color: white;
        }

        #sidebar {
            position: fixed;
            height: 100vh;
            width: 250px;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
            overflow-y: auto;
            /* Enable vertical scrollbar if needed */
            z-index: 1;
            /* Ensure the sidebar is above the content */
        }

        .container-content {
            margin-left: 250px;
            /* Adjust margin to accommodate the fixed sidebar */
            transition: margin-left 0.5s;
            /* Add a smooth transition effect when adjusting the margin */
        }

        .wrapper {
            display: flex;
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

        .navbar {
            display: flex;
            justify-content: flex-end;
            /* Align to the right */
            align-items: center;
            background-color: #f8f9fa;
            padding: 10px 20px;
        }

        #mode-toggle {
            background-color: transparent;
            color: black;
            border: none;
            cursor: pointer;
            /* Add cursor pointer */
        }

        #mode-toggle i {
            margin-right: 5px;
        }

        #moon-icon,
        #sun-icon {
            display: inline;
            /* Ensure icons are initially displayed */
        }

        #moon-icon.hide,
        #sun-icon.hide {
            display: none;
            /* Hide icons when necessary */
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
                <!-- Tambahkan daftar menu sesuai kebutuhan -->
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
                <a href="{{ route('lokasi') }}"><i class="bi bi-geo-alt"></i> Maps Pemilih</a>
                <a href="{{ route('history.index') }}"><i class="bi bi-clock-history"></i> History Maps</a>
            </ul>
            @if (!request()->has('keyword'))
                <center><a href="{{ route('dashboard') }}" class="btn btn-danger"><i
                            class="bi bi-arrow-left-circle"></i> Back to Dashboard</a>
                </center>
            @endif
        </nav>

        <div class="container container-content">
            <div class="nav" style="justify-content: end;margin-top: 10px;">
            <button id="mode-toggle">
                <i class="bi bi-moon-fill" id="moon-icon"></i>
                <i class="bi bi-brightness-high-fill" id="sun-icon"></i>
            </button>
            </div>
            {{-- content alll --}}
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS and other scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Retrieve the mode from localStorage, default to 'light' if not set
            const savedMode = localStorage.getItem('mode') || 'light';

            // Set the body class based on the saved mode
            document.body.classList.toggle('dark-mode', savedMode === 'dark');

            // Toggle icons based on the saved mode
            toggleIcons(savedMode === 'dark');

            // Remove the splash screen after 1 second
            setTimeout(function() {
                document.getElementById('splash-screen').style.display = 'none';
            }, 1000);
        });

        document.getElementById('mode-toggle').addEventListener('click', function() {
            // Toggle dark mode class on the body
            document.body.classList.toggle('dark-mode');

            // Save the current mode to localStorage
            const currentMode = document.body.classList.contains('dark-mode') ? 'dark' : 'light';
            localStorage.setItem('mode', currentMode);

            // Toggle icons based on the current mode
            toggleIcons(document.body.classList.contains('dark-mode'));
        });

        function toggleIcons(isDarkMode) {
            const moonIcon = document.getElementById('moon-icon');
            const sunIcon = document.getElementById('sun-icon');

            if (isDarkMode) {
                moonIcon.style.display = 'none';
                sunIcon.style.display = 'inline';
            } else {
                moonIcon.style.display = 'inline';
                sunIcon.style.display = 'none';
            }
        }
    </script>
</body>

</html>
