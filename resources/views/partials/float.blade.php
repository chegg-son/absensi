@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endpush

<div class="dropdown rounded m-3">
    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Daftar Menu
    </button>
    <ul class="dropdown-menu">
        @if (auth()->check())
            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a class="dropdown-item" href="{{ route('rekap') }}">Rekap</a></li>
            <li><a class="dropdown-item" href="{{ route('pegawai') }}">Pegawai</a></li>
            <li class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('action.logout') }}">Logout</a></li>
            {{-- @elseif (!auth()->check())
            <li><a class="dropdown-item" href="{{ route('action.login') }}">Login</a></li> --}}
        @endif
    </ul>
</div>


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endpush
