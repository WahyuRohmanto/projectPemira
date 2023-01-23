@extends('layouts.app')
@section('content')
@php
$no = 1;
@endphp


<section class="container py-5 px-3 d-flex justify-content-center flex-column" width="100">
    @foreach ($kandidat as $data_K)

    <div class="container p-5">
        <div class="p-rspp flex-column d-flex justify-content-center">
            <h2 class="t-center">Calon
                Pasangan {{$no ++}}</h2>
            <span class="bb-title"></span>
        </div>
        <div class="d-flex justify-content-center p-5">
            @empty($data_K->image)
            <img class="img-cls" src="{{url('/images/kandidat/no_foto.jpeg')}}" alt="">
            @else
            <img class="img-cls" src="{{ url('/images/kandidat/1647741450.png' ) }}" alt="">
            @endif
        </div>
        <h3 class="px-5 lbl-color d-flex justify-content-center">{{ $data_K->nama }}</h3>

        {{-- accordion --}}
        <div class="accordion pt-5" id="accordionExample">
            <div class="accordion-item px-5">
                <div class="border-bottom border-3 pb-3" id="headingOne">
                    <a class="border-0 outline-none btn p-0" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        <h3 class="lbl-color">Visi</h3>
                    </a>
                </div>
                <div id="collapseOne" class="show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="py-3">
                        {{$data_K->visi}}
                    </div>
                </div>
            </div>
            <div class="accordion-item px-5">
                <div class="border-bottom border-3 pb-3 pt-2" id="headingTwo">
                    <a class="border-0  btn p-0" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                        <h3 class="lbl-color">Misi</h3>
                    </a>
                </div>
                <div id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="py-3">
                        {{$data_K->misi}}
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center pt-4">
                <form action="{{ route('vote') }}" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id_kandidat" value="{{ $data_K->id }}">
                    <button type="submit" class="btn-voting">
                        Voting</button>
                </form>
            </div>
        </div>
        {{-- end accordion --}}
    </div>

    @endforeach

</section>

@include('partials.footer')
@endsection