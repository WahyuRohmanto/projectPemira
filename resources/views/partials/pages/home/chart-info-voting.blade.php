<section class="section bg-white">
    <div class="container">
        <h1 id="count" class="fw-bold text-color mb-5 text-center">Perhitungan Langsung Sementara</h1>
        <div class="row justify-content-center mb-5">
            <!---- @START__LIVE_COUNTING --->
            <div class="col-lg-6">
                <div data-aos="fade-down">
                    {{-- <p class="bg-primary badge rounded p-2 text-center">Data akan diupdate dalam : <span id="countDown"></span></p> --}}
                    <canvas id="chartVotingSementara" aria-label="chart voting sementara"></canvas>
                </div>
            </div>
            <div class="col-lg-6">
                <div data-aos="fade-down">
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
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
            @push('scripts')
                <script src="{{asset('js/livecount/livecount.min.js')}}"></script>
                <script src="{{asset('js/totalsuara/totalsuara.js')}}"></script>
            @endpush
            <!---- @END__LIVE_COUNTING ---->
        </div>
    </div>
</section>
