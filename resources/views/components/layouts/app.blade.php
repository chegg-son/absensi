<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lalu Lintas Pegawai PIAT7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @livewireStyles
    @livewireScripts
    @stack('css')
</head>

<body>
    <div class="min-vh-100">
        <div class="float-end">@include('partials.float')</div>
        <div class="container" style="max-width: 768px">
            <div>
                {{-- Navbar --}}
                @include('partials.navbar')

                <!-- flash message -->
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <!-- end flash message -->

                <!-- component -->
                {{ $slot }}
                @yield('content')
                <!-- end component -->

                @include('partials.footbar')
            </div>
        </div>

    </div>
    <!-- javascript -->
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    @stack('scripts')
</body>

</html>
