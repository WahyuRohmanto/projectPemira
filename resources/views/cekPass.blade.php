@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center flex-column pt-5 vh-100" style="max-width: 600px;">
    <label class="text-center" for="">SILAHKAN MASUKAN NIM ANDA</label>
    <input class="m form-control text-center mt-1" type="text" name="" id="nim" style="border-radius: 20px;">
    <span class="d-flex justify-content-center mt-2">
        <button type="button" class="btn btn-outline-success" onclick="cekUserPassword()">CEK</button>
    </span>
    <br>
    <br>
    <br>
    <div class="container">
        <h5 class="text-center" id="">password kamu adalah</h5>
        <h1 class="text-center" id="passwordResult"></h1>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        const cekUserPassword = async () => {
            const nim = $("#nim").val();
            const response = await axios.get('/api/get_user_password/'+nim);
            const data = response.data.data;
            $("#passwordResult").text(data.password_noHash);
        } 
    </script>
@endpush