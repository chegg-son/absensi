<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @livewireStyles
    @livewireScripts
    @stack('css')
</head>

<body>
    <div class="d-flex min-vh-100">
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
                <!-- end component -->

            </div>
        </div>


    </div>

    <!-- javascript -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
