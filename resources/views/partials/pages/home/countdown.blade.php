<div title="container-countdown" class="position-relative">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#6D9A86" fill-opacity="1"
            d="M0,96L40,128C80,160,160,224,240,234.7C320,245,400,203,480,202.7C560,203,640,245,720,240C800,235,880,181,960,160C1040,139,1120,149,1200,160C1280,171,1360,181,1400,186.7L1440,192L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
        </path>
    </svg>
    <div class="d-grid bg-color" style="z-index: 1">
        <div class="container">
            <p class="fs-1 rounded-pill text-center p-3 m-auto px-5 fw-bold" id="demo"></p>
            <p class="fs-1 text-center mt-4 text-white"><i class="fa fa-paper-plane"></i> Menuju Voting</p>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#6D9A86" fill-opacity="1"
            d="M0,224L40,202.7C80,181,160,139,240,133.3C320,128,400,160,480,149.3C560,139,640,85,720,85.3C800,85,880,139,960,138.7C1040,139,1120,85,1200,58.7C1280,32,1360,32,1400,32L1440,32L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
        </path>
    </svg>
</div>
@push('scripts')
<script>
// Set the date we're counting down to
let countDownDate = new Date("Mar 1, 2023 06:00:00").getTime();

// Update the count down every 1 second
let x = setInterval(function() {
    // Get today's date and time
    let now = new Date().getTime();

    // Find the distance between now and the count down date
    let distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML =
        days + " hari " + hours + " jam " + minutes + " menit " + seconds + " detik ";

    // If the count down is over, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "Sesi Voting Sudah di Mulai ";
        let limitTime = new Date("Mar 2, 2023 19:00:00").getTime()
        if (now > limitTime) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "Sesi Voting Sudah Di Tutup";
        }
    }
}, 1000);
</script>
@endpush