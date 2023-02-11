@extends('layouts.app')
@section('content')
<section class="container">
    <div class="d-flex justify-content-center"><img class="img-fluid" src="{{ asset('/img/banner-01.jpg') }}" width=""
            alt=""></div>
    <br>
    <div class="">
        <h1>Dengan hormat,</h1><br>
        <p>Kami mengundang Anda untuk hadir pada acara pemilihan Presiden dan Wakil Presiden Mahasiswa tahun 2023. Ini
            adalah kesempatan bagi kami semua untuk memilih pemimpin-pemimpin yang akan memimpin organisasi mahasiswa
            kita
            dan memperjuangkan hak dan kepentingan kami selama satu tahun ke depan.</p><br>
        <p>Waktu: [jam acara] <br>
            Tempat: [alamat acara]</p><br>
        <p>Kami sangat mengharapkan kehadiran Anda dan partisipasi Anda dalam memilih pemimpin yang terbaik. Jika Anda
            membutuhkan informasi lebih lanjut, silakan hubungi kami melalui [nomor telepon atau email].</p><br>
        <p>Hormat Kami</p><br>
        <p>Panitia Pemira</p>
    </div>
</section>

@endsection