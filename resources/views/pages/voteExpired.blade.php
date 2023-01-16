@extends('layouts.app')
@section('content')
@php
$no = 1;
@endphp


<section class="container">
    test
</section>

























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

<div class="container" style="margin-top:7rem; height:100vh">
    <div class="row">
        @foreach ($kandidat as $data_K)
        <div class="col-xl-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary text-center w-100">Kandidat {{ $no++ }}
                    </h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="pt-4 pb-2 d-flex flex-row align-items-center justify-content-center">
                        <img class="img-fluid" style="width:250px;height:300px;object-fit:cover;"
                            src="{{ $data_K->image == null ? 'https://dummyimage.com/250x300/000/fff' : '/images/kandidat/' . $data_K->image }}"
                            alt="">
                    </div>
                    <div class="d-flex flex-row align-items-center justify-content-center">
                        <h3>{{ $data_K->nama }}</h3>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="mt-4 text-center small">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" onclick="visiMisi('{!! $data_K->visi_misi !!}')">
                            <i class="fa fa-cogs"></i> Visi & Misi
                        </button>
                        <form action="{{ route('vote') }}" method="post" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id_kandidat" value="{{ $data_K->id }}">
                            <button type="submit" class="btn btn-success"><i class="fa fa-vote-yea"></i>
                                Voting</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @push('kandidat')
    <script>
    const visiMisi = (visi_misi) => {
        $("#visi_misiKandidat").html('');
        $("#visi_misiKandidat").html(visi_misi);
    }
    </script>
    @endpush
    @endsection