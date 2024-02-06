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

    /* css night mode */
    .btn-container {
  display: table-cell;
  vertical-align: middle;
  text-align: center;
}

.btn-container i {
  display: inline-block;
  position: relative;
  top: -9px;
}

label {
  font-size: 13px;
  color: #424242;
  font-weight: 500;
}

.btn-color-mode-switch {
  display: inline-block;
  margin: 0px;
  position: relative;
}

.btn-color-mode-switch > label.btn-color-mode-switch-inner {
  margin: 0px;
  width: 140px;
  height: 30px;
  background: #E0E0E0;
  border-radius: 26px;
  overflow: hidden;
  position: relative;
  transition: all 0.3s ease;
    /*box-shadow: 0px 0px 8px 0px rgba(17, 17, 17, 0.34) inset;*/
  display: block;
}

.btn-color-mode-switch > label.btn-color-mode-switch-inner:before {
  content: attr(data-on);
  position: absolute;
  font-size: 12px;
  font-weight: 500;
  top: 7px;
  right: 20px;
}

.btn-color-mode-switch > label.btn-color-mode-switch-inner:after {
  content: attr(data-off);
  width: 70px;
  height: 25px;
  background: #fff;
  border-radius: 26px;
  position: absolute;
  left: 2px;
  top: 2px;
  text-align: center;
  transition: all 0.3s ease;
  box-shadow: 0px 0px 6px -2px #111;
  padding: 5px 0px;
}

.btn-color-mode-switch > .alert {
  display: none;
  background: #FF9800;
  border: none;
  color: #fff;
}

.btn-color-mode-switch input[type="checkbox"] {
  cursor: pointer;
  width: 50px;
  height: 25px;
  opacity: 0;
  position: absolute;
  top: 0;
  z-index: 1;
  margin: 0px;
}

.btn-color-mode-switch input[type="checkbox"]:checked + label.btn-color-mode-switch-inner {
  background: #151515;
  color: #fff;
}

.btn-color-mode-switch input[type="checkbox"]:checked + label.btn-color-mode-switch-inner:after {
  content: attr(data-on);
  left: 68px;
  background: #3c3c3c;
}

.btn-color-mode-switch input[type="checkbox"]:checked + label.btn-color-mode-switch-inner:before {
  content: attr(data-off);
  right: auto;
  left: 20px;
}

.btn-color-mode-switch input[type="checkbox"]:checked ~ .alert {
  display: block;
}

.dark-preview {
  background: #0d0d0d;
}

.white-preview {
  background: #fff;
}


    /* penutup css night mode */
    </style>

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
                    <label class="btn-color-mode-switch-inner" data-off="Light" data-on="Dark" for="color_mode"></label>
                </label>
            </div>
            </center>        

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
                <center><a href="{{ route('dashboard') }}" class="btn btn-danger" style="box-shadow: 0px 0px 5px #c32323,0px 0px 30px #c32323,0px 0px 90px #c32323;"><i
                            class="bi bi-arrow-left-circle"></i> Back to Dashboard</a>
                </center>
            @endif
        </nav>

        <div class="container container-content">
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
    <script type = "text/javascript" >
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
                            url: "{{url('delete-all')}}",
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
</body>
</html>
