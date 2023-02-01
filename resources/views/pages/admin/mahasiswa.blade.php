@extends('pages/admin/layouts/app')
@section('title')
Mahasiswa
@endsection

@section('active-users')
active
@endsection

@section('dataTablesCSS')
<link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- Edit Modal -->
<form action="" id="form-edit" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data
                        Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" id="nim-mahasiswa" class="form-control" name="nim" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama-mahasiswa" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email-mahasiswa" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Password</label>
                        <input type="password" id="password-mahasiswa" class="form-control" name="password"
                            placeholder="Masukan Password">
                    </div>
                    <div class="mb-3">
                        <label for="thn_masuk" class="form-label">Tahun
                            Masuk</label>
                        <input type="text" id="tahun-mahasiswa" class="form-control" name="thn_masuk" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-sm btn-modal" data-bs-toggle="modal" data-bs-target="#addModal">
                Add <i class="fa fa-plus"></i>
            </a>

            <!-- Add Modal -->
            <form action="/admin/mahasiswa/" method="POST" enctype="multipart/form-data">
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Data Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                @csrf
                                <div class="mb-3">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="text" class="form-control" name="nim" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="thn_masuk" class="form-label">Tahun Masuk</label>
                                    <input type="text" class="form-control" name="thn_masuk" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i>
                                    Save</button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    {{-- label table --}}
                    <tr>
                        @php
                        $title = ['NIM', 'Nama', 'Email', 'Tahun Masuk', 'Action'];
                        @endphp

                        @foreach($title as $row)
                        <th>{{$row}}</th>
                        @endforeach
                    </tr>
                    {{-- end label --}}
                </thead>
                <tbody>

                    @forelse ($mahasiswa as $key => $data_M)
                    <tr>
                        <td>{{ $data_M->nim }}</td>
                        <td>{{ $data_M->name }}</td>
                        <td>{!! $data_M->email == null ? '<label class="badge badge-danger">Belum Verifikasi</label>' :
                            $data_M->email !!}
                        </td>
                        <td>{{ $data_M->tahun }}</td>
                        <td>
                            <form action="/admin/mahasiswa/{{ $data_M->id }}" method="POST"
                                onsubmit="return confirm('Apa Anda yakin akan menghapus data Mahasiswa {{ $data_M->nama }} ?')">
                                <button type="button" class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal"
                                    data-bs-target="#editModal"
                                    onclick="editMahasiswa({{ $data_M->id }}, '{{ $data_M->nim }}', '{{ $data_M->name }}', '{{ $data_M->email }}', '{{ $data_M->tahun }}')">
                                    <i class="fa fa-edit"></i> Edit
                                </button>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger mb-1" name="submit">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td>Data not Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection

@section('dataTablesJS')
<script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>
<script>
const editMahasiswa = (id, nim, name, email, tahun) => {
    $("#form-edit").attr('action', '/admin/mahasiswa/' + id);
    $("#nim-mahasiswa").val(nim);
    $("#nama-mahasiswa").val(name);
    $("#email-mahasiswa").val(email);
    $("#tahun-mahasiswa").val(tahun);
}
</script>
@endsection