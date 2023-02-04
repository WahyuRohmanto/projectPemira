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
                    <div class="chart-pie pt-4 pb-1">
                        <canvas id="chartVotingSementara" aria-label="chart voting sementara"></canvas>
                    </div>
                    <table class="table table-bordered table-striped mt-3" id="myTable">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
        integrity="sha512-60KwWtZOhzgr840mc57MV8JqDZHAws3w61mhK45KsYHmhyNFJKmfg4M7/s2Jsn4PgtQ4Uhr9xItS+HCbGTIRYQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.25.0/axios.min.js"
        integrity="sha512-/Q6t3CASm04EliI1QyIDAA/nDo9R8FQ/BULoUFyN4n/BDdyIxeH7u++Z+eobdmr11gG5D/6nPFyDlnisDwhpYA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/livecount/livecount.min.js')}}"></script>
    <script src="{{asset('js/totalsuara/totalsuara.js')}}"></script>
    @endsection
    @push('kode')
    @endpush