@extends('layout.main')

@section('content')

<div class="row justify-content-center mt-4">
    <div class="col-md-6">

        <form action="/pesanans" method="post">

            @csrf
            <h1 class="h3 mb-4 fw-normal text-center text-primary"><b>PEMESANAN</b></h1>
            <div class="mb-3 row">
                <label for="jenis_pesanan" class="col-sm col-form-label">Jenis Pesanan</label>
                <div class="col-sm">
                <input type="text" class="form-control" id="jenis_pesanan" name="jenis_pesanan">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="judul_proyek" class="col-sm col-form-label">Judul Proyek</label>
                <div class="col-sm">
                <input type="text" class="form-control" id="judul_proyek" name="judul_proyek">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="penanggungjawab" class="col-sm col-form-label">Nama Penanggung Jawab</label>
                <div class="col-sm">
                <input type="text" class="form-control" id="penanggungjawab"  name="penanggungjawab">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="perusahaan" class="col-sm col-form-label">Nama Perusahaan</label>
                <div class="col-sm">
                <input type="text" class="form-control" id="perusahaan" name="perusahaan">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nomor_penanggungjawab" class="col-sm col-form-label">No. Tlp Penanggung Jawab</label>
                <div class="col-sm">
                <input type="text" class="form-control" id="nomor_penanggungjawab"  name="nomor_penanggungjawab">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="deskripsi" class="col-sm col-form-label">Deskripsi Projek</label>
                <div class="col-sm">
                <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"></textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="dedline" class="col-sm col-form-label">Deadline</label>
                <div class="col-sm">
                <input type="date" class="form-control" id="dedline" name="dedline">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="budget" class="col-sm col-form-label">Budget</label>
                <div class="col-sm">
                <input type="number" class="form-control" id="budget" name="budget">
                </div> 
            </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            <div></div>
        </form>
    </div>

</div>
@endsection