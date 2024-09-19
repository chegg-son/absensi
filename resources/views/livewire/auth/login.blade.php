<div class="">
    <div class="d-flex justify-content-center mb-3">
        <div class="card" style="width: 75%">
            <div class="card-footer">Login</div>
            <div class="card-body">
                <form wire:submit.prevent="login">
                    <div class="mb-3">
                        <span>Username:</span>
                        <input wire:model.lazy="username" type="text"
                            class="form-control @error('username') is-invalid @enderror" id="username">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <span>Password: </span>
                        <input wire:model.lazy="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" id="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="text-center ">
                        <button class="btn btn-success w-100">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
