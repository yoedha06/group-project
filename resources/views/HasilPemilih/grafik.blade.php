<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grafik Hasil Pemilihan</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="h-screen bg-gray-100">

    <div class="mt-4 text-center">
        <a href="{{ url()->previous() }}"
            class="flex items-center justify-center bg-blue-500 text-white font-semibold py-2 px-4 rounded-full hover:bg-blue-700 transition-all duration-300">
            <i class="bi bi-arrow-left-circle mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>
    
    <div class="p-6 m-20 bg-white rounded shadow">
        {!! $chart->container() !!}
    </div>

    <!-- Back Button -->

    </div>

    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
</body>

</html>
