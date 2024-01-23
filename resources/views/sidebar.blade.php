
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.25.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="/assets/images/logo.png" />
    <title>Pemilu</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        .wrapper {
            display: flex;
        }

        #sidebar {
            height: 100vh;
            width: 250px;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
        }

        #content {
            flex: 1;
            padding: 20px;
        }

        .sidebar-header {
            text-align: center;
            padding-bottom: 20px;
        }

        .sidebar-header h3 {
            margin-bottom: 0;
        }

        .sidebar-header img {
            max-width: 90px;
            margin-top: 10px;
        }

        .list-unstyled {
            padding: 20px 0;
        }

        .list-unstyled a {
            padding: 16px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        .list-unstyled a:hover {
            background-color: #454d55;
        }

        .main-content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
        }

    </style>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="{{ asset("/assets/images/ppp-removebg-preview.png") }}" alt="Logo">
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
                @if (!request()->has('keyword'))
                <a href="{{ route('dashboard') }}" class="btn btn-danger btn-block mt-4"><i
                        class="bi bi-arrow-left-circle"></i> Back to Dashboard</a>
            @endif
            </ul>
        </nav>

        <!-- Page content -->
        <div id="content" class="main-content">
            <!-- Your page content goes here -->
            @yield('konten')
        </div>
    </div>


    <!-- Bootstrap and other scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
