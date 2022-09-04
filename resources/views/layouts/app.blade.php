<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
                        <a href="#">Jadwal</a>
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
