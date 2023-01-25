@extends('layouts.app')
@section('content')
@php
$no = 1;
@endphp


<section class="container py-5 px-3 d-flex justify-content-center flex-column" width="100">
    @foreach ($kandidat as $data_K)
    <div class="row">
        <div class="col-md-6">
            <div class="paslon"><img class="rounded foto" src="{{ asset('images/kandidat/kandidat1.png') }}" alt=""
                    width="500rem">
            </div>

            <div class="card text-center mb-3 card-name" style="border-radius: 20px; opacity: 100%">
                <div class="card-body card-name2">
                    <h5 class="card-title">{{$data_K->nama}}</h5>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-primary visi-btn" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Visi & Misi
                        </button>

                        <form action="{{ route('vote') }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id_kandidat" value="{{ $data_K->id }}">
                            <button type="submit" class="btn vote-btn">VOTE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="paslon"><img class="rounded foto" src="{{ asset('images/kandidat/kandidat1.png') }}" alt=""
                    width="500rem">
            </div>
            <div class="card text-center mb-3 card-name" style="border-radius: 20px; opacity: 100%">
                <div class="card-body card-name2">
                    <h5 class="card-title">Asep Sahrudin & Aliandra Daniele</h5>
                    <button href="#" class="btn btn-primary visi-btn">Visi & Misi</button>
                    <button href=" #" class="btn vote-btn">VOTE</button>
                </div>
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="paslon"><img class="rounded foto" src="{{ asset('images/kandidat/kandidat1.png') }}" alt=""
                    width="500rem">
            </div>
            <div class="card text-center mb-3 card-name" style="border-radius: 20px; opacity: 100%">
                <div class="card-body card-name2">
                    <h5 class="card-title">Asep Sahrudin & Aliandra Daniele</h5>
                    <button href="#" class="btn btn-primary visi-btn">Visi & Misi</button>
                    <button href=" #" class="btn vote-btn">VOTE</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header" style="background-color: #6D9A86;">
                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Visi Misi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!!$data_K->visi_misi!!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>
@include('partials.footer')
@endsection