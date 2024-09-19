@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endpush

<nav class="navbar bg-success rounded-bottom">
    <div class="container-fluid justify-content-center">
        <a class="navbar-brand">
            <img src="{{ url('assets/images/logo-piat7.png') }}" alt="Logo"
                class="d-inline-block align-text-top img-fluid">
        </a>
    </div>
    @if (auth()->check())
        <div class="container justify-content-start">
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <strong>Menu</strong>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/users" wire:navigate>User</a></li>
                    <li class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/logout" wire:navigate>Logout</a></li>
                </ul>
            </div>
        </div>
    @endif
</nav>
<br>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endpush
