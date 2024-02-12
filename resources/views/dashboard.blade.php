<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/png" href="/assets/images/logo.png" /> 
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}" />
    <title>Dashboard</title>
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
            <div class="d-flex align-items-left">
                <a href="{{ route('dashboard') }}" class="logo-container" style="text-decoration: none;">
                    <img src="{{ asset('/assets/images/ppp-removebg-preview.png') }}" style="max-width:60px;">
                    <div class="logo-text">
                        <p style="font-size: 1.5em; margin: 0;">Pemilu</p>
                        <p style="font-size: 1em; margin: 0; color: #666;">Masa Depan dalam Genggaman Anda</p>
                    </div>
                </a>
            </div>
            <!-- //nandainn-->
            <div class="container ">
                    <div class="container justify-content-center">
                        <ul class="navbar-nav">
                        @if(auth()->check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}"><b><i class="bi bi-house-door-fill"></i> Home</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pemilih.index') }}"><b><i class="bi bi-person-fill"></i> Pemilih</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('kandidat.index') }}"><b><i class="bi bi-people-fill"></i> Kandidat</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('partai_politik.index') }}"><b><i class="bi bi-flag-fill"></i> Partai Politik</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('hasilpemilihan.index') }}"><b><i class="bi bi-bar-chart-line-fill"></i> Hasil Pemilihan</b></a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col" style="margin-right:150px;">
                            @if(auth()->guest())
                                        <a class="btn btn-outline-dark" href="{{ route('login') }}"><b>Login</b></a>
                                    @endif
                            @if(auth()->check())
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-dark" style="width: 120px;"><b><i class="bi bi-box-arrow-right">&nbsp;Logout</i></b></button>
                                </form>
                            @endif
                        </div>
                    </div>

                    <div class="custom-control custom-switch mode-toggle" style="padding-top: 10px;">
                        <input type="checkbox" class="custom-control-input" id="mode-toggle">
                        <label class="custom-control-label" for="mode-toggle"><p>Mode</p></label>
                    </div>
                    
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
                Selamat Datang {{ $userName }} di Pemilu 2024
            </h1>
        @else
            <h1 class="display-4" style="font-size: 2.5em; margin-bottom: 20px;">
                Selamat Datang di Pemilu 2024
            </h1>
        @endif
        <h2 style="font-size: 1.2em; line-height: 1.5; max-width: 800px; margin: 0 auto; color:white;">
            Beri suara Anda untuk masa
            depan yang lebih baik! Ikuti debat, pelajari visi dan misi kandidat, dan partisipasi aktif dalam Pemilu
            2024.
        </h2>
    </header>

    <div class="container">
        <section class="features">
            <section class="countdown" id="countdown">
                <h2 class="display-4">Pemilu Akan Dimulai Dalam Waktu:</h2>
                <div id="timer" class="countdown-timer"></div>
            </section>
        </section>
    </div>
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

        <section class="schedule">
            <div class="schedule-box">
                <h2 class="display-4 text-center">Jadwal dan Kegiatan Pemilu</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kegiatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1 April 2024</td>
                                <td>Pembukaan Pendaftaran Kandidat</td>
                            </tr>
                            <tr>
                                <td>5 April 2024</td>
                                <td>Debat Kandidat</td>
                            </tr>
                            <tr>
                                <td>15 April 2024</td>
                                <td>Debat Kandidat Putaran Kedua (jika ada)</td>
                            </tr>
                            <tr>
                                <td>20 April 2024</td>
                                <td>Pemilihan Umum</td>
                            </tr>
                            <tr>
                                <td>25 April 2024</td>
                                <td>Pengumuman Hasil</td>
                            </tr>
                            <tr>
                                <td>28 April 2024</td>
                                <td>Deklarasi Pemenang</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="features">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="feature-box" style="min-width:100%;white-space:normal;">
                            <h3>Tujuan Pemilu</h3>
                            <p>
                                Tujuan dari Pemilu 2024 adalah memberikan hak suara kepada warga negara untuk memilih
                                pemimpin
                                dan wakil rakyat yang akan mewakili dan mengambil keputusan atas nama masyarakat. Pemilu
                                juga
                                bertujuan untuk meningkatkan partisipasi politik, menetapkan legitimasi pemerintah, dan
                                mewujudkan prinsip demokrasi.
                            </p>
                        </div>
                        <!-- Kesimpulan Pemilu -->
                        <div class="feature-box" style="min-width:100%;white-space:normal;top:20px;">
                            <h3>Kesimpulan</h3>
                            <p>
                                Pemilu adalah suatu proses yang krusial dalam menjalankan prinsip demokrasi di suatu
                                negara.
                                Melalui pemilu, warga negara dapat memilih pemimpin dan perwakilan yang dianggap mampu
                                mewakili serta mengimplementasikan kepentingan masyarakat.
                            </p>
                            <p>
                                Pemilu juga menjadi wujud partisipasi aktif dalam kehidupan politik dan merupakan
                                fondasi
                                utama dalam menjaga stabilitas dan keberlanjutan suatu sistem pemerintahan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pengumuman Pemilu Section -->
        <section class="features">
            <div class="container">
                <div class="feature-box">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="feature">
                                <h3>Pengumuman Pemilu</h3>
                                <img src="http://smkn11bdg.sch.id/fotoGuru/1620289429.jpg" alt="Pengumuman Pemilu"
                                    class="img-fluid">
                                <p class="mt-3">
                                    Pemilihan Umum 2024 adalah kesempatan bagi Anda untuk memiliki suara dalam
                                    menentukan
                                    masa depan negara. Berikan suara Anda dan tunjukkan bahwa setiap suara memiliki
                                    arti yang besar!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="candidates">
            <h2 class="display-4 text-center">Kandidat Pemilu</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="candidate">
                        <img src="/assets/images/anis.jpg" alt="Candidate 1" class="img-fluid sama-ukuran">
                        <!-- Tambahkan elemen untuk detail kandidat -->
                        <div class="candidate-details">
                            <h3 class="h4">Anies Baswedan - H. A. Muhaimin Iskandar</h3>
                            <p>Memastikan Ketersediaan Kebutuhan Pokok dan Biaya Hidup Murah melalui Kemandirian Pangan,
                                Ketahanan Energi, dan Kedaulatan Air.
                            </p>
                            <p>Detail lengkap profil kandidat dapat dilihat di <a href="/">halaman kandidat</a>.
                            </p>
                        </div>
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
                        <!-- Tambahkan elemen untuk detail kandidat -->
                        <div class="candidate-details">
                            <h3 class="h4">Prabowo Subianto - Gibran Rakabuming Raka</h3>
                            <p>Memperkuat penyelarasan kehidupan yang harmonis dengan lingkungan, alam, dan budaya,
                                serta peningkatan toleransi antarumat beragama untuk mencapai masyarakat yang adil dan
                                makmur</p>
                            <p>Detail lengkap profil kandidat dapat dilihat di <a href="/">halaman kandidat</a>.
                            </p>
                        </div>
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
                        <!-- Tambahkan elemen untuk detail kandidat -->
                        <div class="candidate-details">
                            <h3 class="h4">Ganjar Pranowo - H. Madhfud MD</h3>
                            <p>Mempercepat pembangunan manusia Indonesia unggul yang berkualitas, produktif, dan
                                berkepribadian</p>
                            <p>Detail lengkap profil kandidat dapat dilihat di <a href="/">halaman kandidat</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h3>Kontak Pemilu</h3>
                        <p>
                            Alamat Pemilu: Jl. Demokrasi<br>
                            Kota Pemilihan, Kec. Pemilih<br><br>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <h3>Telepon</h3>
                        <p>
                            <strong>Telepon:</strong> +62 83123456789<br>
                            <strong>Email:</strong> info@pemilu2024.com<br>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <h3>Media Sosial</h3>
                        <p>
                            <strong>Ikuti Kami:</strong>
                        </p>
                        <div class="social-media" style="display: flex; flex-direction: column;">
                            <a href="https://www.facebook.com/pemilu2024" target="_blank"><i
                                    class="bi bi-facebook"></i>Facebook</a>
                            <br>
                            <a href="https://twitter.com/pemilu2024" target="_blank"><i
                                    class="bi bi-twitter"></i>Twitter</a>
                            <br>
                            <a href="https://www.instagram.com/pemilu2024/" target="_blank"><i
                                    class="bi bi-instagram"></i>Instagram</a>
                            <br>
                            <a href="https://www.youtube.com/pemilu2024/" target="_blank"><i
                                    class="bi bi-youtube"></i>Youtube</a>
                            <br>
                            <a href="https://www.tiktok.com/pemilu2024/" target="_blank"><i
                                    class="bi bi-tiktok"></i>Tiktok</a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h3>Lokasi</h3>
                        <!-- Masukkan URL Google Maps Anda di bagian "src" -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9602393178247!2d107.53767906983687!3d-6.895359452209558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e59b48322cdb%3A0x10a755b12e9aef37!2sBITC%20(Baros%20Information%2C%20Technology%2C%20%26%20Creative%20Center!5e0!3m2!1sid!2sid!4v1706238002196!5m2!1sid!2sid"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <footer>
        <p class="mb-0">&copy;CopyrightCIGS PRIDE 2024.</p>
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

    // Tanggal pemilu dimulai (tahun, bulan (0-11), tanggal, jam, menit, detik)
    var electionStartDate = new Date(2024, 1, 14, 07, 00, 00).getTime();

    // Fungsi untuk mengupdate tampilan timer
    function updateTimer() {
        // Waktu sekarang
        var now = new Date().getTime();

        // Selisih waktu antara sekarang dan tanggal pemilu dimulai
        var timeDifference = electionStartDate - now;

        // Hitung hari, jam, menit, dan detik
        var days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

        // Tampilkan waktu di elemen dengan id "timer"
        var timerElement = document.getElementById("timer");
        timerElement.innerHTML = days + " Hari " + hours + " Jam " +
            minutes + " Menit " + seconds + " Detik ";

        // Jika waktu sudah habis, tampilkan pesan
        if (timeDifference < 0) {
            clearInterval(countdownTimer);
            timerElement.innerHTML = "Pemilu Sudah Dimulai!";
        }
    }

    // Update timer setiap detik
    var countdownTimer = setInterval(updateTimer, 1000);

    // Panggil fungsi updateTimer untuk menampilkan timer secara langsung
    updateTimer();
</script>

<script>
    // Ambil elemen toggle mode
    const modeToggle = document.getElementById('mode-toggle');

    // Tambahkan event listener untuk perubahan toggle
    modeToggle.addEventListener('change', function () {
        // Jika toggle dipilih, ubah mode ke gelap
        if (this.checked) {
            document.body.classList.remove('day-mode');
            document.body.classList.add('night-mode');
        } else {
            // Jika tidak dipilih, ubah mode ke terang
            document.body.classList.remove('night-mode');
            document.body.classList.add('day-mode');
        }
    });

</script>
