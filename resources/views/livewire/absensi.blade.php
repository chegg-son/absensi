@push('css')
    <style>
        body {
            background-color: #f8fafc;
        }

        .card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        /* remove input number style */
        input[type="number"] {
            -webkit-appearance: none;
            padding: 15px;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endpush

<div>
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">Absensi</h1>
        </div>

    </div>
    <br>
    <form wire:submit.prevent="recordAbsensi">
        @csrf
        <div class="input-group">
            <input type="number" inputmode="numeric" class="form-control w-full" type="text" wire:model.defer="cardId"
                placeholder="Scan kartu pegawai pada RFID scanner" autofocus>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
