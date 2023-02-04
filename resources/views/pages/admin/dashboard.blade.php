@extends('pages/admin/layouts/app')
@section('title')
    Dashboard
@endsection

@section('active-dashboard')
    active
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-8000">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Mahasiswa</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mahasiswa }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Jumlah Kandidat</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Verifikasi
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $regis_user }}</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: {{ $regis_count }}%" aria-valuenow="{{ $regis_count }}"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Jumlah Suara Masuk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-7 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Persentase Pemilih</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <h4 class="text-center"><span id="progressLabel" class="fw-bold"></span></h4> 
                        <div class="progress" style="height: 30px;" > 
                            <div class="progress-bar progress-bar-striped" id="voteProgress" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="2000">
                            </div>
                        </div>
                        <h5 class="text-center mt-2 bg-secondary text-white p-1" ><span id="totalLabel"></span> Suara masuk dari 2000 Pemilih</h5>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-5 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Perhitungan</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body mb-4">
                        <div class="chart-pie">
                            <canvas id="chartVotingSementara" aria-label="chart voting sementara"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('dataTablesJS')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{asset('js/livecount/livecount.min.js')}}"></script>
    <script>
        const progressBarProcessor = async () => {
            const response = await axios.get('/api/live_count');
                const kandidatData = response.data.data;
                let total = 0;
                const totalData = 
                kandidatData.forEach(response => {
                    total += response.jumlah_suara;
                });
                console.log(total);
                $("#voteProgress").attr('aria-valuenow',total).css('width',function(){
                    let hasil = total / 2000 * (100); 
                    $("#progressLabel").text(hasil+"%");
                    return hasil+"%";
                });
                $("#totalLabel").text(total);
        }
        progressBarProcessor();
    </script>
    
@endsection
