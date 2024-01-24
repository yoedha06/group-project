<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="/assets/images/logo.png" />
    <title>Pemilu</title>
    <style>
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
            z-index: 1001;
            /* Ensure content is on top of the navbar */
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

        body {
            background: url('assets/images/cprs.jpg') center center fixed;
            background-size: 103%;
            background-position: center 60%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .navbar {
            background-color: #f8f9fa;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1001;
            /* Ensure navbar is on top of the splash screen */
        }

        .navbar-brand {
            font-size: 24px;
            padding: 10px;
        }

        .navbar-brand img {
            width: 40px;
            height: auto;
            margin-right: 10px;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .navbar-nav .nav-item {
            margin-right: 10px;
        }

        .container-fluid {
            padding-top: 60px;
            padding-bottom: 20px;
        }

        b {
            color: black;
        }

        b:hover {
            color: red;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
    </style>

</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <!-- Splash Screeenn -->
        <div id="splash-screen">
            <div id="splash-content">
                <!-- Ganti konten lord-icon dengan gambar GIF -->
                <img src="https://cdn.kibrispdr.org/data/390/gambar-kartun-coblos-4.gif" alt="GIF Logo"
                    style="width: 250px; height: 250px;" id="myLordIcon">
        
                <h2>Pemilu...</h2>
            </div>
        </div>
        <div class="container">
            <a href="{{ route('dashboard') }}"><img src="{{ asset('/assets/images/ppp-removebg-preview.png') }}" style="max-width:70px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pemilih.index') }}"><b>Pemilih</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kandidat.index') }}"><b>Kandidat</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('partai_politik.index') }}"><b>Partai Politik</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hasilpemilihan.index') }}"><b>Hasil Pemilih</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        // Menunggu konten utama dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Menghilangkan splash screen setelah 1 detik
            setTimeout(function() {
                document.getElementById('splash-screen').style.display = 'none';
            }, 1000);
        });
        </script>
</body>

</html>
