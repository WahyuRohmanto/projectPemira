<section class="section bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <!---- @START__LIVE_COUNTING --->
            <div class="col-lg-8">
                <div data-aos="fade-down">
                    <h1 id="count" class="fw-bold text-color mt-5 mb-5 text-center">Perhitungan Langsung Sementara</h1>
                    {{-- <p class="bg-primary badge rounded p-2 text-center">Data akan diupdate dalam : <span id="countDown"></span></p> --}}
                    <canvas id="chartVotingSementara" aria-label="chart voting sementara"></canvas>
                </div>
            </div>
            @push('scripts')
                <script src="{{asset('js/livecount/livecount.js')}}"></script>
            @endpush
            <!---- @END__LIVE_COUNTING ---->
        </div>
    </div>
</section>
