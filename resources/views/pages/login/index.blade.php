@extends('app')

@section('content')
    <div class="row justify-content-center align-items-center mb-3">
        <div class="col-9">
            <div class="card border-0 rounded shadow">
                <div class="card-body">
                    <h5 class="text-center"> <i class="fa fa-user-circle"></i>LOGIN ADMIN</h5>
                    <hr>
                    <form action="{{ route('action.login') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="username" class="fw-bold">USERNAME</label>
                            <input type="text" name="username"
                                class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="fw-bold">PASSWORD</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success w-100 ">LOGIN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
