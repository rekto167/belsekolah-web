<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://unpkg.com/@victoryoalli/alpinejs-moment@1.0.0/dist/moment.min.js" defer></script>
    <script src="https://unpkg.com/@victoryoalli/alpinejs-timeout@1.0.0/dist/timeout.min.js" defer></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
    <title>@yield('title')</title>
</head>

<body>
    <navbar>
        <div class="w-full p-3 bg-cyan-500 flex">
            <div class="mr-3">
                <h1>Bel Sekolah</h1>
            </div>
            <div class="font-semibold text-slate-100 flex">
                <ul class="flex">
                    <li class="mr-2">
                        <a href="{{ route('hari') }}">Hari</a>
                    </li>
                    <li class="mr-2">
                        <a href="{{ route('aktifitas') }}">Aktifitas</a>
                    </li>
                    <li class="mr-2">
                        <a href="{{ route('jadwal') }}">Jadwal</a>
                    </li>
                    <li class="mr-2">
                        <a href="{{ route('bell') }}">Bell</a>
                    </li>
                </ul>
            </div>
        </div>
    </navbar>
    <div class="main p-3">
        @yield('content')
    </div>
    @livewireScripts
</body>

</html>
