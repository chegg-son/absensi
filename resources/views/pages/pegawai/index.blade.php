@extends('app')
@push('css')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.colVis.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
@section('content')
    <div>
        <div class="card mb-3">
            <h1 class="text-center">Daftar Pegawai</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <table id="pegawaiTable" class="display border" style="width: 100%">
                    <thead class="table-success">
                        <tr>
                            <th class="col-1">#</th>
                            <th class="col-1">NIP</th>
                            <th class="col-7">Nama</th>
                            <th class="col-1">Bidang</th>
                            <th class="col-2">Aksi</th>
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
                                    <a href="{{ route('pegawai.show', $user->id) }}" class="btn btn-primary btn-sm"><span
                                            class="fas fa-pen"></span></a>
                                    <button class="btn btn-danger btn-sm" onclick="deletePegawai()"><span
                                            class="fas fa-trash"></span></button>
                                    <form id="deletePegawai" class="d-inline"
                                        action="{{ route('pegawai.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function deletePegawai() {
            Swal.fire({
                title: "Hapus Pegawai?",
                text: "Apakah anda yakin ingin menghapus data ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Tidak",
                confirmButtonText: "Ya!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deletePegawai').submit();
                }
            });
        }
    </script>
    <script>
        new DataTable('#pegawaiTable', {
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
