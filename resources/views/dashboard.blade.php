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
            background-position: center 20%; /* AAdjust the vertical position (20% from the top in this example) */
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
        }
    </style>
</head>
<body>

<div class="container-fluid d-flex flex-column justify-content-center align-items-center">
    <h1 class="mb-4">Pemilu</h1>
    <div class="card">
        <div class="card-body">
            <a href="{{ route('pemilih.index') }}" class="btn btn-primary">Pemilih</a>
            <a href="{{ route('kandidat.index') }}" class="btn btn-secondary">Kandidat</a>
            <a href="{{ route('partai_politik.index') }}" class="btn btn-primary">Partai Politik</a>
            <a href="{{ route('hasilpemilihan.index') }}" class="btn btn-secondary">Hasil Pemilih</a>
        </div>
    </div>
</div>

<!-- Sesuaikan dengan library JavaScript yang Anda gunakan, contoh menggunakan Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
