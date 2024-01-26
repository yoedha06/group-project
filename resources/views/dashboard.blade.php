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

        /* Body Styles */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #f8f9fa;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1001;
        }

        .navbar-brand {
            font-size: 24px;
            padding: 10px;
            margin-right: auto;
            /* Memindahkan logo ke ujung kiri */
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

        /* Content Styles */
        .features {
            display: flex;
            justify-content: space-around;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        .feature-box {
            flex: 1;
            margin: 0 10px;
            max-width: 300px;
        }

        .feature {
            text-align: center;
        }

        .feature h2 {
            margin-bottom: 10px;
        }

        .feature p {
            margin-bottom: 20px;
        }

        .feature-divider {
            border: 1px solid #ddd;
            margin: 20px 0;
        }

        .candidates {
            background-color: #fff;
            padding: 40px;
            margin: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .candidate {
            text-align: center;
            margin-bottom: 20px;
        }

        .candidate img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .candidate img.sama-ukuran {
            width: 100%;
            height: auto;
        }

        /* Footer Styles */
        footer {
            background-color: red;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .logo-container {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #000;
            /* Warna teks */
        }

        .logo-text {
            margin-left: 10px;
            /* Jarak antara logo dan teks */
        }

        .logo-text p {
            margin: 5px 0;
            /* Jarak antara paragraf tulisan "Pemilu" dan subjudulnya */
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <!-- Splash Screen -->
        <div id="splash-screen">
            <div id="splash-content">
                <img src="https://cdn.kibrispdr.org/data/390/gambar-kartun-coblos-4.gif" alt="GIF Logo"
                    style="width: 250px; height: 250px;" id="myLordIcon">
                <h2>Pemilu...</h2>
            </div>
        </div>

        <div class="container">
            <div class="container">
                <a href="{{ route('dashboard') }}" class="logo-container">
                    <img src="{{ asset('/assets/images/ppp-removebg-preview.png') }}" style="max-width:70px;">
                    <div class="logo-text">
                        <p style="font-size: 1.5em; margin: 0;">Pemilu</p>
                        <p style="font-size: 1em; margin: 0; color: #666;">Masa Depan dalam Genggaman Anda</p>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                    @if(auth()->check())
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
                            <a class="nav-link" href="{{ route('hasilpemilihan.index') }}"><b>Hasil Pemilihan</b></a>
                        </li>
                        @endif
      </ul>
        </div>
                @if(auth()->guest())
                            <a class="btn btn-outline-primary" href="{{ route('login') }}"><b>Login</b></a>
                        @endif
                @if(auth()->check())
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-dark">Logout</button>
        </form>
    </div>
@endif

            </div>
    </nav>
    <br>
    <br>
    <header style="text-align: center; padding: 50px; background-color: red; color: #fff;">
    @if(auth()->check())
    @php
        $userName = auth()->user()->name;
    @endphp
    <h1 class="display-4" style="font-size: 2.5em; margin-bottom: 20px;">
        Selamat Datang, {{ $userName }} di Pemilu 2024
    </h1>
@else
    <h1 class="display-4" style="font-size: 2.5em; margin-bottom: 20px;">
        Selamat Datang di Pemilu 2024
    </h1>
@endif

        <p style="font-size: 1.2em; line-height: 1.5; max-width: 800px; margin: 0 auto;">Beri suara Anda untuk masa
            depan yang lebih baik! Ikuti debat, pelajari visi dan misi kandidat, dan partisipasi aktif dalam Pemilu
            2024.</p>
    </header>

    <div class="container">
        <section class="features">
            <div class="feature-box">
                <div class="feature">

                    <h2>Informasi Pemilu</h2>
                    <p>Pemilihan Umum 2024 akan diselenggarakan pada tanggal <strong>20 April 2024</strong>. Segera
                        daftarkan diri Anda untuk memberikan suara!</p>
                    <p>Informasi lebih lanjut dapat ditemukan di <a href="/">website resmi Pemilu 2024</a>.</p>
                </div>
            </div>
            <hr class="feature-divider">
            <div class="feature-box">
                <div class="feature">
                    <h2>Partisipasi Rakyat</h2>
                    <p>Partisipasi aktif masyarakat sangat penting. Ikuti debat kandidat, pelajari visi dan misi mereka,
                        dan berikan suara Anda untuk masa depan yang lebih baik.</p>
                    <p>Agenda debat dan informasi terkait dapat dilihat di <a href="/">halaman acara Pemilu</a>.
                    </p>
                </div>
            </div>
            <hr class="feature-divider">
            <div class="feature-box">
                <div class="feature">
                    <h2>Pentingnya Suara Anda</h2>
                    <p>Setiap suara sangat berarti. Suara Anda adalah langkah menuju perubahan. Lihat statistik
                        partisipasi
                        dan temukan inspirasi di <a href="/">halaman partisipasi pemilih</a>.</p>
                </div>
            </div>
        </section>

        <section class="candidates">
            <h2 class="display-4 text-center">Kandidat Pemilu</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="candidate">
                        <img src="/assets/images/anis.jpg" alt="Candidate 1" class="img-fluid sama-ukuran">
                        <h3 class="h4">Anies Baswedan - H. A. Muhaimin Iskandar</h3>
                        <p>Memastikan Ketersediaan Kebutuhan Pokok dan Biaya Hidup Murah melalui Kemandirian Pangan,
                            Ketahanan Energi, dan Kedaulatan Air.
                        </p>
                        <p>Detail lengkap profil kandidat dapat dilihat di <a href="/">halaman kandidat</a>.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="candidates">
            <h2 class="display-4 text-center">Kandidat Pemilu</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="candidate">
                        <img src="/assets/images/wowo.jpg" alt="Candidate 2" class="img-fluid sama-ukuran">
                        <h3 class="h4">Prabowo Subianto - Gibran Rakabuming Raka</h3>
                        <p>Memperkuat Pertahanan Negara</p>
                        <p>Detail lengkap profil kandidat dapat dilihat di <a href="/">halaman kandidat</a>.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="candidates">
            <h2 class="display-4 text-center">Kandidat Pemilu</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="candidate">
                        <img src="/assets/images/ganjar.jpg" alt="Candidate 3" class="img-fluid sama-ukuran">
                        <h3 class="h4">Ganjar Pranowo - H. Madhfud MD</h3>
                        <p>Menciptakan 17 juta lapangan kerja</p>
                        <p>Detail lengkap profil kandidat dapat dilihat di <a href="/">halaman kandidat</a>.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <p class="mb-0">&copy; 2024 Pemilu. Hak Cipta Dilindungi.</p>
    </footer>
</body>

</html>

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
