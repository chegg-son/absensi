@push('css')
    <style>
        .nav-link {
            background-color: green;
        }
    </style>
@endpush

<nav class="navbar bg-success rounded-bottom">

    <div class="container-fluid justify-content-center">

        <a class="navbar-brand">
            <img src="{{ url('assets/images/logo-piat7.png') }}" alt="Logo"
                class="d-inline-block align-text-top img-fluid">
        </a>
    </div>
</nav>
<br>
@if (auth()->check())
    <div class="grid mb-3">
        <ul class="nav nav-tabs nav-fill">
            <li class="nav-item">
                <a class="nav-link active" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">User</a>
            </li>
        </ul>
    </div>
@endif
