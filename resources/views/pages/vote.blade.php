@extends('layouts.app')
@section('content')
@php
$no = 1;
@endphp


<section class="container py-5 px-3 d-flex justify-content-center flex-column" width="100">
    @foreach ($kandidat as $data_K)
    <div class="row">
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
    @endforeach
</section>
@include('partials.footer')
@endsection