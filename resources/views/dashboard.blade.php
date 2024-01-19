<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="/assets/images/logo.png" />
    <title>Pemilu</title>
    <style>
        body {
            background: url('assets/images/cprs.jpg') center center fixed;
            background-size: 103%;
            background-position: center 20%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h1 {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 70px;
            color: black;
            margin-bottom: 20px;
        }

        .navbar {
            background-color: #343a40;
            /* Warna latar belakang navbar */
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 24px;
            color: #ffffff;
            /* Warna teks logo */
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

        .navbar-nav .nav-link {
            color: #ffffff !important;
            /* Warna teks tautan navbar */
            transition: color 0.3s ease;
            /* Efek transisi warna */
        }

        .navbar-nav .nav-link:hover {
            color: #c91a31 !important;
            /* Warna teks tautan navbar pada hover */
        }

        .container-fluid {
            padding-top: 60px;
            padding-bottom: 20px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <img src="{{ asset('/assets/images/ppp-removebg-preview.png') }}" style="max-width:70px;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pemilih.index') }}">Pemilih</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kandidat.index') }}">Kandidat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('partai_politik.index') }}">Partai Politik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hasilpemilihan.index') }}">Hasil Pemilih</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid d-flex flex-column justify-content-center align-items-center">
        <div class="card">
            <!-- Your card content goes here -->
        </div>
    </div>

    <!-- Include the necessary JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
