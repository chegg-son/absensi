@push('css')
    <style>
        body {
            background-color: #f8fafc;
        }

        .input-group {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
        <h2 class="text-center">Lalu Lintas Absensi Pegawai PIAT7</h2>
    </div>
    <br>
    <div class="input-group">
        <input wire:keydown.enter="recordAbsensi" type="number" inputmode="numeric" class="form-control w-full"
            type="text" wire:model.defer="cardId" placeholder="Scan kartu pegawai pada RFID scanner" autofocus>
        <button wire:click="recordAbsensi" class="btn btn-success" type="submit">Submit</button>
    </div>
    <br>
    <div class="card mb-3">
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
                @if ($log_absensi->count() == 0)
                    <tr>
                        <td colspan="4" class="text-center fw-bold">Tidak ada trafik absensi</td>
                    </tr>
                @endif
                <?php $no = 1; ?>
                @foreach ($log_absensi as $log)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $log->pegawai->nama }}</td>
                        <td>{{ $log->keterangan }}</td>
                        <td>{{ $log->waktu }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
</div>
