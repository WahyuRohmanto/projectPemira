@extends('layouts.app')
@section('content')


<!---- @HERO --->
@include('../partials/pages/home/hero')

@include('../partials/pages/home/countdown')

@include('../partials/pages/home/langkah-voting')

<hr class="container" />
<br />
<br />
<br />

@include('../partials/pages/home/chart-info-voting')

<hr class="container" />
<br />
<br />
<br />

@include('../partials/pages/home/cek-daftar-pemilih-tetap')

<hr class="container" />
<br />
<br />
<br />

@include('../partials/pages/home/syarat-dan-ketentuan')

<hr class="container" />
<br />
<br />
<br />

@include('../partials/pages/home/kritik-dan-saran')

<script type="text/javascript">
window.$crisp = [];
window.CRISP_WEBSITE_ID = "5e6c2451-b3d6-4db8-adab-1163292d7bbe";
(() => {
    d = document;
    s = d.createElement("script");
    s.src = "https://client.crisp.chat/l.js";
    s.async = 1;
    d.getElementsByTagName("head")[0].appendChild(s);
})();
</script>
@include('../partials/footer')
@endsection