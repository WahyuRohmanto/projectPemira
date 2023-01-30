@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center item-center ">
    {{-- left container --}}
    <div class="login-container">
        <div class="box-left">
            <div class="sub-container">
                <!-- <h1>KPR STTNF 2023</h1> -->
                <!-- <a href="/">
                    <img src="{{ asset('/img/logo-v2.png') }}" alt="" class="logo-v2" height="200" />
                </a> -->
            </div>
        </div>
        {{-- right container --}}
        <div class="box-right vh-100">
            <h2 id="wwk">
                "Pilihlah pilihan dengan kebijakan yang terbaik untuk memastikan bahwa anda membuat keputusan yang
                tepat, untuk keberlangsungan jangka panjang "
            </h2>
            <a href="/voting" class="choice" id="choice">
                <h2 class="co" id="mulai">Mulai Memilih</h2>
            </a>
        </div>
    </div>
</div>
<!-- MASIH ADA SCRIPT YANG BELOM DI PANGGIL --->
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('#wwk').text('Pilihlah untuk masa depan yang lebih baik, ea ea !');
    });
</script>
@endpush