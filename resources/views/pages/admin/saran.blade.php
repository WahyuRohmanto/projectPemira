@extends('pages/admin/layouts/app')
@section('title')
Saran
@endsection

@section('active-saran')
active
@endsection

@section('dataTablesCSS')
<link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-8000">Kritik & Saran</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kritik & Saran</h6>

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
                        $title = ['NIM', 'Nama', 'Email', 'Pesan'];
                        @endphp

                        @foreach($title as $row)
                        <th>{{$row}}</th>
                        @endforeach
                    </tr>
                    {{-- end label --}}
                </thead>
                <tbody>
                    @foreach ($saran as $s)
                    <tr>
                        <td>{{ $s->nim }}</td>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->email }}</td>
                        <td>{{ $s->pesan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
@section('dataTablesJS')
<script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>
@endsection