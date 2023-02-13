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
                        <input type="hidden" name="user_id" id="user_id">
                        <label class="mb-2 fw-bold">NIM</label>
                        <input type="number" class="form-control" name="nim" id="nim" onkeyup="searchDataUser()"
                            placeholder="Masukan NIM" required />
                    </div>
                    <div class="col-md-6">
                        <label class="mb-2 fw-bold">Nama</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Nama Akan muncul setelah anda input nim" required readonly />
                    </div>
                    {{-- <div class="col-md-12 mt-2 mb-2">
                        <label class="mb-2 fw-bold">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="" required readonly/>
                    </div> --}}
                    <div class="col-md-12 mt-2 mb-2">
                        <label class="mb-2 fw-bold">Pesan</label>
                        <textarea rows="5" placeholder="Masukan Pesan" name="pesan" class="form-control"
                            required>{{ $valueMessage }}</textarea>
                        <button type="submit" class="btn btn-md bg-color text-white mt-4" {{ $buttonCondition }}
                            id="btnKirimSaran" disabled>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.25.0/axios.min.js"
    integrity="sha512-/Q6t3CASm04EliI1QyIDAA/nDo9R8FQ/BULoUFyN4n/BDdyIxeH7u++Z+eobdmr11gG5D/6nPFyDlnisDwhpYA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
const searchDataUser = async () => {
    const nim = $('#nim').val();
    const allUsersResponse = await axios.get('/api/cek-kandidat/' + nim).catch(console.log('is typing'));

    let nameResult = allUsersResponse.data.data.name;
    let idResult = allUsersResponse.data.data.id;
    // const emailResult = allUsersResponse.data.data.email;
    if (nameResult) {
        $("#name").val(nameResult);
        $("#user_id").val(idResult);
        $('#btnKirimSaran').prop('disabled', false);
    }
}
</script>