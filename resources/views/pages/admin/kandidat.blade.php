@extends('pages/admin/layouts/app')
@section('title')
Kandidat
@endsection

@section('active-kandidat')
active
@endsection

@section('dataTablesCSS')
<link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@php
$no = 1;
@endphp

@section('content')
<!-- Edit Modal -->
<form action="" id="form-edit" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="editKandidat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data
                        Kandidat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @csrf
                    @method('PUT')
                    <div class="row">
                        <label for="" class="form-label fw-bold">Presma</label>
                        <div class="mb-3 col-md-6">
                            <label for="formedit_nim_presma" class="form-label">NIM</label>
                            <input type="text" id="formedit_nim_presma" class="form-control"
                                onkeyup="searchDataPresma()" name="nim_presma" required>
                            {{-- <button class="btn btn-success" type="button">Cek</button> --}}
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="formedit_nama_presma" class="form-control" name="nama_presma"
                                readonly>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="form-label fw-bold">Wapresma</label>
                        <div class="mb-3 col-md-6">
                            <label for="formedit_nim_wapresma" class="form-label">NIM</label>
                            <input type="text" id="formedit_nim_wapresma" onkeyup="searchDataWapresma()"
                                class="form-control" name="nim_wapresma" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="formedit_nama_wapresma" class="form-control" name="nama_wapresma"
                                readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="visi_misi" class="form-label">Visi & Misi</label>
                        <textarea id="summernote_edit" class="form-control" aria-label="With textarea" name="visi_misi"
                            required></textarea>

                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Foto</label>
                        <input type="file" id="image-kandidat" class="form-control" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

{{-- tambah data modal --}}
<form action="" id="form-tambah" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="tambahKandidat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kandidat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @csrf
                    <div class="row">
                        <label for="" class="form-label fw-bold">Presma</label>
                        <div class="mb-3 col-md-6">
                            <label for="formadd_nim_presma" class="form-label">NIM</label>
                            <input type="text" id="formadd_nim_presma" class="form-control" onkeyup="searchDataPresma()"
                                name="nim_presma" required>
                            <input type="hidden" id="presma_id" class="form-control" name="presma_id" required>
                            {{-- <button class="btn btn-success" type="button">Cek</button> --}}
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="formadd_nama_presma" class="form-control" name="nama_presma"
                                readonly>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="form-label fw-bold">Wapresma</label>
                        <div class="mb-3 col-md-6">
                            <label for="formadd_nim_wapresma" class="form-label">NIM</label>
                            <input type="text" id="formadd_nim_wapresma" onkeyup="searchDataWapresma()"
                                class="form-control" name="nim_wapresma" required>
                            <input type="hidden" id="wapresma_id" class="form-control" name="wapresma_id" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="formadd_nama_wapresma" class="form-control" name="nama_wapresma"
                                readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="visi_misi" class="form-label">Visi & Misi</label>
                        <textarea id="summernote" class="form-control" aria-label="With textarea" name="visi_misi"
                            required></textarea>

                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Foto</label>
                        <input type="file" id="image-kandidat" class="form-control" name="image" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Visi Misi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="visi_misiKandidat"></div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between">
        <h1 class="h3 mb-2 text-gray-800">Data Kandidat</h1>
        <a href="#" class="btn btn-admin" href="#" data-bs-toggle="modal" data-bs-target="#tambahKandidat">Tambah
            Data</a>
    </div>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}
    <div class="row mt-4">
        @forelse ($kandidat as $data_K)
        <div class="col-xl-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold fnt-kandidat">Kandidat {{ $no++ }}</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Action:</div>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editKandidat"
                                onclick="editKandidat({{ $data_K->id }}, '{{ $data_K->presma->nim }}', '{{ $data_K->presma->name }}', '{{ $data_K->visi_misi }}')">Edit</a>
                            {{-- <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a> --}}
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="pt-4 pb-2 d-flex flex-row align-items-center justify-content-center">
                        <img class="img-fluid" style="width:250px;height:300px;object-fit:cover;"
                            src="{{ $data_K->image == null ? 'https://dummyimage.com/250x300/000/fff' : '/images/kandidat/' . $data_K->image }}"
                            alt="">
                    </div>
                    <div class="d-flex flex-row align-items-center text-center">
                        <h3>{{ $data_K->presma->name }} & {{ $data_K->wapresma->name }}</h3>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="mt-4 text-center small">
                        <span class="">
                            <!-- Button trigger modal -->
                            <form action="" id="modal-kandidat">
                                <a class="btn-modal" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    onclick="visiMisi('{!! $data_K->visi !!}','\n', '{!! $data_K->misi !!}')">
                                    Visi & Misi
                                </a>
                            </form>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="container">
            <h2 class="text-center">Belum ada data kandidat !</h2>
        </div>
        @endforelse
    </div>
</div>
@endsection

@section('dataTablesJS')
<script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>
<script>
const visiMisi = (visi_misi) => {
    console.log(visi_misi)
    $("#visi_misiKandidat").html('');
    $("#visi_misiKandidat").html(visi_misi);
}
</script>
<script>
const editKandidat = (id, presma_id, wapresma_id, visi_misi, image) => {
    $("#form-edit").attr('action', '/admin/kandidat/' + id);
    // $("#formedit_nim_presma").val(nim);
    // $("#formedit_nama_presma").val(nama_presma);
    // $("#formedit_nim_wapresma").val(nim);
    // $("#formedit_nama_wapresma").val(nama_wapresma);
    $("#formedit_presma_id").val(presma_id);
    $("#formedit_wapresma_id").val(wapresma_id);
    // $("#visi_misi-kandidat").val(visi_misi);
    $('#summernote_edit').summernote('code', visi_misi);
}
const searchDataPresma = async () => {
    const nim = $('#formadd_nim_presma').val();
    const allUsersResponse = await axios.get('/api/cek-kandidat/' + nim).catch(console.log('is typing'));

    $("#formadd_nama_presma").val(allUsersResponse.data.data.name);
    $("#presma_id").val(allUsersResponse.data.data.id);

}
const searchDataWapresma = async () => {
    const nim = $('#formadd_nim_wapresma').val();
    const allUsersResponse = await axios.get('/api/cek-kandidat/' + nim);

    $("#formadd_nama_wapresma").val(allUsersResponse.data.data.name);
    $("#wapresma_id").val(allUsersResponse.data.data.id);

}
</script>
@endsection