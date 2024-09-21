<div>
    <div class="card mb-3">
        <div class="card-body">
            <h2 class="text-center">Daftar Pegawai</h2>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="pegawaiTable" class="display border" style="width: 100%">
                <thead class="table-success">
                    <tr>
                        <th class="col-1">#</th>
                        <th class="col-1">NIP</th>
                        <th class="col-8">Nama</th>
                        <th class="col-1">Bidang</th>
                        <th class="col-1">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawais as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->nip }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->bidang }}</td>
                            <td>
                                <button wire:click="edit({{ $user->id }})"
                                    class="btn btn-primary btn-sm">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
