@extends('layouts.app')
@section('content')
<div class="container-fluid cekContainer text-light py-5 d-flex justify-content-center">
    <div class="container mx-auto d-flex d-flex justify-content-center flex-column align-items-center"
        style="max-width: 600px;">
        <h4 class="text-center mb-4">SILAHKAN MASUKAN NIM ANDA</h4>
        <input class="form-control text-center mb-3" type="text" id="nim" style="border-radius: 12px;"
            onkeydown="if (event.keyCode === 13) { event.preventDefault(); cekUserPassword(); }">
        <button class="btn btn-outline-light btn-block" onclick="cekUserPassword()">CEK</button>
        <div class="mt-5">
            <h5 class="text-center mb-3" id="password">Password kamu adalah</h5>
            <h1 class="text-center" id="passwordResult">????</h1>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="{{ asset('js/myjs.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
const cekUserPassword = async () => {
    const nim = $("#nim").val();
    const response = await axios.get('/api/get_user_password/' + nim);
    const data = response.data.data;
    if (data) {
        $("#password").text("Password Kamu Adalah")
        $("#passwordResult").text(data.password_noHash);
    } else {
        $("#password").text(" ");
        $("#passwordResult").text("Data Tidak Ditemukan");
    }
}
</script>
@endpush