@extends('layout.main')

@section('content')

<div class="row justify-content-center mt-4">
    <div class="col-md-6">
        <div class="row">
            <div class="col">
                <div class="row">
                    <h1 class="h1 mb-4 fw-normal text-center"><b>Pilih Jenis Laporan</b></h1>
                </div>
                <div class="row">
                <div class="row justify-content-center mt-4">
                    <div class="col">
                        <form action="/testimonis/{{ $testimoni->id }}" method="post">
                            @csrf
                            @method("patch")
                            <h1 class="h3 mb-4 fw-normal text-center text-primary"><b>PORTOFOLIO</b></h1>
                            <input type="hidden" name="id" value="{{ $testimoni->id }}">
                            <div class="mb-3 row">
                                <label for="pesanan_id" class="col-sm col-form-label">ID Pesanan</label>
                                <div class="col-sm">
                                    <select class="form-select" aria-label="Default select example" id="pesanan_id" name="pesanan_id">
                                        @foreach ($pesanans as $pesanan)
                                            <option value="{{ $pesanan->id }}" 
                                            @if ($testimoni->pesanan_id==$pesanan->id)
                                               selected 
                                            @endif>{{ $pesanan->id }} : {{ substr($pesanan->judul_proyek,0,30) }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="mb-3 row">
                                <label for="url" class="col-sm col-form-label">Link Url</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" id="url" name="url" value="{{ $testimoni->url }}">
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
            </div>
        </div>
    </div>

</div>

@endsection