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
            -moz-appearance: textfield;
            padding: 15px;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
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
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </form>
    <br>
    <div class="card">
        <h4 class="mb-3">Log Absensi</h4>
        <table class="table table-responsive-sm table-hover">
            <thead class="table-success">
                <tr>
                    <th class="col-1">#</th>
                    <th class="col-5">Nama</th>
                    <th>Keterangan</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($absensis as $absensi)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $absensi->pegawai->nama }}</td>
                        <td>Checkout Pertama</td>
                        <td>{{ $absensi->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
</div>
