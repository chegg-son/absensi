@extends('app')
@section('content')
    <div class="card mb-3">
        <h1 class="text-center">{{ $user->nama }}</h1>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('pegawai.action.edit', $user->id) }}" class="needs-validation" method="post" novalidate
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-3">
                    <div class="col-2 m-auto">
                        <label for="">NIP</label>
                        <span class="float-end">:</span>
                    </div>
                    <div class="col-10">
                        <input name="nip" type="text" class="form-control @error('nip') is-invalid @enderror"
                            value="{{ $user->nip }}">
                        @error('nip')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2 m-auto">
                        <label for="">Nama</label>
                        <span class="float-end">:</span>
                    </div>
                    <div class="col-10">
                        <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                            value="{{ $user->nama }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2 m-auto">
                        <label for="">Foto</label>
                        <span class="float-end">:</span>
                    </div>
                    <div class="col-10">
                        <input type="file" name="foto" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2 m-auto">
                        <label for="">RFID</label>
                        <span class="float-end">:</span>
                    </div>
                    <div class="col-10">
                        <input type="text" name="rfid" class="form-control @error('rfid') is-invalid @enderror"
                            value="{{ $user->rfid }}">
                        @error('rfid')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col text-center">
                        @if (!$user->foto)
                            <div>Data foto tidak ada!</div>
                        @else
                            <img class="rounded" src="{{ asset('storage/photos/' . $user->foto) }}" alt>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6">
                        <a href="{{ route('pegawai') }}" class="w-100 btn btn-secondary"><span><i
                                    class="fas fa-arrow-left"></i></span>
                            Kembali</a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="w-100 btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
