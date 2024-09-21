@extends('app')
@section('content')
    <div class="card text-center mb-3">
        <h1>Rekap Lalu Lintas PIAT7</h1>
    </div>

    <div class="card mb-3">
        <table id="rekap" class="display border" style="width: 100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Bidang</th>
                    <th>Keterangan</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rekap_absensi as $rekap)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $rekap->pegawai->nama }}</td>
                        <td>{{ $rekap->pegawai->bidang }}</td>
                        <td>{{ $rekap->keterangan }}</td>
                        <td>{{ $rekap->waktu }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection

@push('scripts')
    <script>
        new DataTable('#rekap', {
            layout: {
                topStart: {
                    buttons: [{
                            extend: 'print',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        'excel',
                        'pdf',
                        'colvis',
                    ]
                }
            }
        });
    </script>
@endpush
