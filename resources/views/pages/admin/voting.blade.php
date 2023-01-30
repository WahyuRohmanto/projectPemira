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
                        <h6 class="m-0 font-weight-bold text-primary">Jumlah Suara Masuk</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Kandidat 1
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Kandidat 2
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Suara Masuk</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-striped" id="dataTable" width="100%">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Coblos</th>
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
    @endsection
