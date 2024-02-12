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

    <link rel="stylesheet" href="{{ asset('css/layouts.css') }}">

</head>

<body id="body-mode">
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
        <nav id="sidebar" class="active">
            <center>
                <div class="btn-container">
                    <label class="switch btn-color-mode-switch">
                        <input value="1" id="color_mode" name="color_mode" type="checkbox">
                        <label class="btn-color-mode-switch-inner" data-off="Light" data-on="Dark"
                            for="color_mode">
                        </label>
                    </label>
                </div>
            </center>

            <div class="sidebar-header">
                <img src="{{ asset('/assets/images/ppp-removebg-preview.png') }}" alt="Logo">
                <h3>Pemilu</h3>
            </div>

            <ul class="list-unstyled">
                <!-- Tambahkan daftar menu sesuai kebutuhan -->
                <li class="{{ Request::is('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}"><i class="bi bi-house-door"></i> Home</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-list"></i> Data Master <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('pemilih.index') }}"><i class="bi bi-person"></i> Pemilih </a></li>
                        <li><a href="{{ route('kandidat.index') }}"><i class="bi bi-person"></i> Kandidat </a></li>
                        <li><a href="{{ route('partai_politik.index') }}"><i class="bi bi-flag"></i> Partai Politik </a></li>
                        <li><a href="{{ route('hasilpemilihan.index') }}"><i class="bi bi-bar-chart-line"></i> Hasil Pemilihan </a></li>
                    </ul>
                </li>

                <a href="{{ route('lokasi') }}"><i class="bi bi-geo-alt"></i> Maps Pemilih</a>
                <a href="{{ route('history.index') }}"><i class="bi bi-clock-history"></i> History Maps</a>
            </ul>
            @if (!request()->has('keyword'))
                <center><a href="{{ route('dashboard') }}" class="btn btn-danger"
                        style="box-shadow: 0px 0px 5px #c32323,0px 0px 30px #c32323,0px 0px 90px #c32323;"><i
                            class="bi bi-arrow-left-circle"></i> Back to Dashboard</a>
                </center>
            @endif
        </nav>

        <div class="container container-content">
            {{-- content alll --}}
            @yield('content')
        </div>
    </div>

</body>

<!-- Bootstrap JS and other scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menghilangkan splash screen setelah 1 detik
        setTimeout(function() {
            document.getElementById('splash-screen').style.display = 'none';
        }, 1000);
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        checkLocalStorageMode();
    });

    function checkLocalStorageMode() {
        if (localStorage.getItem('mode') === 'dark') {
            changeToDarkMode();
        } else {
            changeToLightMode();
        }
    }

    function changeToDarkMode() {
        document.getElementById('body-mode').className = 'dark-mode';
        document.getElementById('sidebar').className = 'dark-mode active';
        localStorage.setItem('mode', 'dark');
    }

    function changeToLightMode() {
        document.getElementById('body-mode').className = '';
        document.getElementById('sidebar').className = 'active';
        localStorage.setItem('mode', 'light');
    }

    document.querySelector('.btn-color-mode-switch').addEventListener('click', function() {
        if (document.body.classList.contains('dark-mode')) {
            changeToLightMode();
        } else {
            changeToDarkMode();
        }
    });
</script>

{{-- JavaScript Checkbox --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<script type="text/javascript">
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
                        url: "{{ url('delete-all') }}",
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

<script>
    $(document).ready(function(){
        // Menampilkan dropdown dengan animasi ketika diklik
        $('.dropdown-toggle').click(function(){
            $(this).next('.dropdown-menu').slideToggle();
        });

        // Menyembunyikan dropdown dengan animasi ketika klik di luar dropdown
        $(document).click(function(e) {
            var target = e.target;
            if (!$(target).is('.dropdown-toggle') && !$(target).parents().is('.dropdown-toggle')) {
                $('.dropdown-menu').slideUp();
            }
        });
    });
</script>

</html>
