@php
$messageCondition = 'readonly';
$valueMessage = '';
$buttonCondition = 'disabled';
if (Auth::check()) {
if ($saran !== null) {
$messageCondition = 'readonly';
$valueMessage = $saran->pesan;
$buttonCondition = 'disabled';
} else {
$messageCondition = '';
$valueMessage = '';
$buttonCondition = '';
}
}
@endphp

<form action="{{ route('saran') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="container" id="saran">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('/img/saran.svg') }}" class="w-100" />
            </div>
            <div class="col-md-8">
                <h2 class="text-center text-color fw-bold mb-4">Kritik & Saran</h2>
                <div class="row">
                    <div class="col-md-6">
                        <label class="mb-2 fw-bold">Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukan Nama Lengkap" required
                            readonly value="{{ Auth::check() ? Auth::user()->name : '' }}" />
                    </div>
                    <div class="col-md-6">
                        <label class="mb-2 fw-bold">NIM</label>
                        <input type="number" class="form-control" name="nim" placeholder="Masukan NIM" required readonly
                            value="{{ Auth::check() ? Auth::user()->nim : '' }}" />
                    </div>
                    <div class="col-md-12 mt-2 mb-2">
                        <label class="mb-2 fw-bold">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukan Email" required
                            readonly value="{{ Auth::check() ? Auth::user()->email : '' }}" />
                    </div>
                    <div class="col-md-12 mt-2 mb-2">
                        <label class="mb-2 fw-bold">Pesan</label>
                        <textarea rows="5" placeholder="Masukan Pesan" name="pesan" class="form-control" required
                            {{ $messageCondition }}>{{ $valueMessage }}</textarea>
                        <button type="submit" class="btn btn-md bg-color text-white mt-4" {{ $buttonCondition }}>
                            <i class="fa fa-paper-plane"></i> Kirim
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="row text-center mt-5">
                    <div class="col-md-4">
                        <a href="" class="sosmed-link"><i class="fa-brands fa-instagram"></i> kprsttnf</a>
                    </div>
                    <div class="col-md-4">
                        <a href="" class="sosmed-link"><i class="fa-solid fa-envelope"></i>
                            admin@pemirasttnf.com</a>
                    </div>
                    <div class="col-md-4">
                        <a href="" class="sosmed-link"><i class="fa-brands fa-whatsapp"></i> 0895611952367</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>