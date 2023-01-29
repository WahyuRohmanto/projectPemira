@extends("layouts.app")
@section('content')
<section id="home" class="hero-2 bg-center bg-primary position-relative"
    style="background-image: url('{{ asset('/images/hero-1-bg.png') }}');">
    <div class="container">
        <div class="row align-items-center hero-content">
            <div class="col-lg-12">
                <h3 class="text-white text-center display-4 font-weight-semibold mb-4 hero-1-title">CEK Daftar Pemilih
                    Tetap</h3>
            </div>
        </div>
    </div>
</section>
<!-- Hero End -->

<!-- Team start -->
<section class="section bg-light" id="team">
    <div class="container">
        <div class="row align-items-center hero-content">
            <div class="col-lg-12 text-center">
                <h2 class="fw-bold">Pencarian data pemilih</h2>
                <a href="" class="btn btn-primary">Unduh Undangan</a>
            </div>
            <p id="error-msg"></p>
            <div id="simple-msg"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="tableDaftarPemilihTetap" class="table zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>NIM</th>
                                    <th>Angkatan</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
{{-- <script src="{{ asset('/js/jquery.min.js') }}"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript">
const dataTable = new DataTable("#tableDaftarPemilihTetap");

const getAllUsers = async () => {
    const allUsersResponse = await axios.get('/api/allUsers');

    const tableDaftarPemilihTetap = document.querySelector('#tableDaftarPemilihTetap > tbody');

    allUsersResponse.data.forEach((_user, _index) => {
        return tableDaftarPemilihTetap.innerHTML += `<h1>Hai</h1>`
    });
};

getAllUsers();
</script>
@endpush
{{-- <!-- @START__Hero --->
	<section 
		id="home"
		class="hero-2 bg-center bg-primary position-relative" 
		style="background-image: url('{{asset('/images/hero-1-bg.png') }}');"
>
<div class="container">
    <div class="row align-items-center hero-content">
        <div class="col-lg-12">
            <h3 class="text-white text-center display-4 font-weight-semibold mb-4 hero-1-title">Unduh Undangan</h3>
        </div>
    </div>
</div>
</section>
<!-- @END__Hero -->

<!---- @START__Pencarian_Data_Pemilih  --->
<section class="section bg-light" id="team">
    <div class="container">
        <div class="row align-items-center hero-content">
            <header class="col-lg-12 text-center">
                <h2 class="fw-bold">Pencarian data pemilih</h2>
                <p class="text-muted">Silahkan isi form dibawah ini untuk mengecek datamu.</p>
            </header>
            <form id="cekdpt" action="">
                <p id="error-msg"></p>
                <div id="simple-msg"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4 pb-2">
                            <label for="comments" class="text-muted form-label">NIM</label>
                            <input type="text" pattern="[0-9]{5 - 10}" required class="form-control" id="subject"
                                name="nim" placeholder="Masukkan Nim kamu disini" />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <button style="width: 100%" type="submit" id="submit" name="send" class="btn btn-primary">
                                <i class="mdi mdi-account-search"></i><span>Cari Data</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!---- @END__Pencarian_Data_Pemilih  ---> --}}
@endsection