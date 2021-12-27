@extends('layout.main')

@section('content')
<div class="row justify-content-md-center" id="TENTANG">
    <div class="col col-lg-2">

    </div>
    <div class="col-md-auto pt-5">
        <H1>TENTANG</H1>
    </div>
    <div class="col col-lg-2">

    </div>
    <p class="fs-6 text-center mt-n1 pb-4">loremipsumloremipsumloremipsumloremipsumloremipsum</p>
</div>


<div class="row justify-content-md-center align-item-center bg-info" id="logo">
    <div class="col-2">
        <img src="GVX.png" class="img-fluid py-4" alt="...">
    </div>
</div>



<div class="row justify-content-md-center">
    <h1 class="text-center pt-5">PORTOFOLIO</h1>

    <div class="row row-cols-3 pb-4 mt-n3 justify-content-md-center">
        @foreach($testimonis as $testimoni)
        <div class="col text-center">
            <iframe width="1309" height="499" src="{{ $testimoni->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
            p></p>
            <b for="Judul_Proyek">Judul Proyek :</b>
            <div>{{ $testimoni->pesanan->judul_proyek }}</div>
            <b for="Jenis_Pesanan">Jenis Pesanan : </b>
            <div>{{ $testimoni->pesanan->jenis_pesanan }}</div>
        </div>
        @endforeach
    </div>
</div>
@endsection