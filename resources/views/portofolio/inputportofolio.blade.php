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

    <div class="row row-cols-3 pb-4 mt-n3 px-6 ">
        @foreach($testimonis as $testimoni)
        <div class="col-sm bg-info " style="text-align:center;">
            <iframe width="300" height="300" src="{{ $testimoni->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
            <p></p>
            <b for="Judul_Proyek">Judul Proyek :</b>
            <div>{{ $testimoni->pesanan->judul_proyek }}</div>
            <b for="Jenis_Pesanan">Jenis Pesanan : </b>
            <div>{{ $testimoni->pesanan->jenis_pesanan }}</div>
            <b for="ID_pesanan" style="">ID Pesanan : </b>
            <div>{{ $testimoni->pesanan_id }}</div>

        </div>
        @endforeach
    </div>

    <div class="col-md-auto">
    </div>
    <div class="col-md-auto">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalinputdataporto">
            Input Portofolio
        </button>
    </div>
    <div class="col-md-auto">
    </div>

</div>




<!-- Modal -->
<div class="modal fade" id="modalinputdataporto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Portofolio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center mt-4">
                    <div class="col">
                        <form action="/testimonis" method="post">
                            @csrf
                            <h1 class="h3 mb-4 fw-normal text-center text-primary"><b>PORTOFOLIO</b></h1>

                            <div class="mb-3 row">
                                <label for="pesanan_id" class="col-sm col-form-label">ID Pesanan</label>
                                <div class="col-sm">
                                    <select class="form-select" aria-label="Default select example" id="pesanan_id" name="pesanan_id">
                                        <option value=null selected>Pilih Projek</option>
                                        @foreach ($pesanans as $pesanan)
                                            <option value="{{ $pesanan->id }}">{{ $pesanan->id }} : {{ substr($pesanan->judul_proyek,0,30) }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="mb-3 row">
                                <label for="url" class="col-sm col-form-label">Link Url</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" id="url" name="url">
                                </div>
                            </div>

                            <div class="row justify-content-md-center">
                                <div class="col col-lg-2">
                                </div>
                                <div class="col-md-auto">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                                <div class="col col-lg-2">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
@endsection