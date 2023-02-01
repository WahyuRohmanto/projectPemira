@extends('pages/admin/layouts/app')
@section('title')
Voting
@endsection

@section('active-voting')
active
@endsection

@section('dataTablesCSS')
<link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Voting</h1>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fnt-kandidat">Jumlah Suara Masuk</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="chartVotingSementara" aria-label="chart voting sementara"></canvas>
                    </div>
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Paslon</th>
                                <th>Suara</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fnt-kandidat">Data Suara Masuk</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-striped" id="dataTable" width="100%">
                        <thead>
                            @php
                            $title = ['NIM', 'Nama', 'Coblos'];
                            @endphp
                            <tr>
                                @foreach($title as $row)
                                <th>{{$row}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $d->user->nim }}</td>
                                <td>{{ $d->user->name }}</td>
                                <td>{{ @$d->kandidat->presma->name }} & {{ @$d->kandidat->wapresma->name }}</td>
                            </tr>
                            @endforeach
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
    <script src="{{asset('js/livecount/livecount.js')}}"></script>
    <script>
    $.ajax({
        url: 'http://127.0.0.1:8000/api/live_count',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            let kandidatData = response.data;
            // let dataJumlahSuara = [];
            // let namaKandidat = [];

            kandidatData.forEach(response => {
                $('#myTable tr:last').after(
                    `<tr><td>${response.id}</td><td>${response.nama_kandidat}</td><td>${response.jumlah_suara}</td></tr>`
                );
            });
        }
    });
    </script>
    @endsection

    {{-- @push('scripts')
   
    @endpush --}}