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


                    <div class="col-4 mt-2">
                        <div class="card border-primary h-100">
                            <div class="card-body">
                                <div class="row">
                                    <h1 class="text-center"><i class="bi bi-stack"></i></h1>
                                </div>
                                <h5 class="card-title text-center"><b>List Pesanan</b></h5>
                                <p class="card-text">Laporan berisi List Pesanan sesuai tangal yang dipilih</p>
                                <div class="row">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Pilih
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="card border-info h-100">
                            <div class="card-body">
                                <div class="row">
                                    <h1 class="text-center"><i class="bi bi-file-earmark-richtext-fill"></i></h1>
                                </div>
                                <h5 class="card-title text-center"><b>Detil Pesanan</b></h5>
                                <p class="card-text">Mencetak detil pesanan yang dipilih</p>
                                <div class="row">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal2">
                                        Pilih
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="card border-success h-100">
                            <div class="card-body">
                                <div class="row">
                                    <h1 class="text-center"><i class="bi bi-speedometer"></i></h1>
                                </div>
                                <h5 class="card-title text-center"><b>Pendapatan</b></h5>
                                <p class="card-text">Perkiraan Pendapatan berdasarkan tanggal yang dipilih</p>
                                <div class="row">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal3">
                                        Pilih
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center justify-content-center">
                <h5 class="h5 text-center" id="exampleModalLabel">List Pesanan</h5>
            </div>
            <form action="/laporans/list" method="POST">
                @csrf
                <div class="modal-body teks-kecil">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_mulai"
                                    class="form-label @error('tanggal_mulai') is-invalid @enderror">Tanggal Mulai</label>
                                <input type="datetime-local" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                                @error('tanggal_mulai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_selesai"
                                    class="form-label @error('tanggal_selesai') is-invalid @enderror">Tanggal Selesai</label>
                                <input type="datetime-local" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                                @error('tanggal_selesai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary rounded-pill"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill">Lihat List</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center justify-content-center">
                <h5 class="h5 text-center" id="exampleModalLabel">List Pesanan</h5>
            </div>
            <form action="/laporans/detil" method="POST">
                @csrf
                <div class="modal-body teks-kecil">
                    
                    <div class="row">
                        <select class="form-select" aria-label="Default select example" id="pesanan_id" name="pesanan_id">
                            <option value=null selected>Pilih Projek</option>
                            {{-- @foreach ($pesanans as $pesanan)
                                <option value="{{ $pesanan->id }}">{{ $pesanan->id }} : {{ substr($pesanan->judul_proyek,0,30) }}</option>
                            @endforeach --}}
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary rounded-pill"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill">Lihat Detil</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center justify-content-center">
                <h5 class="h5 text-center" id="exampleModalLabel">Laporan Pendapatan</h5>
            </div>
            <form action="/laporans/pendapatan" method="POST">
                @csrf
                <div class="modal-body teks-kecil">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_mulai"
                                    class="form-label @error('tanggal_mulai') is-invalid @enderror">Tanggal Mulai</label>
                                <input type="datetime-local" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                                @error('tanggal_mulai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_selesai"
                                    class="form-label @error('tanggal_selesai') is-invalid @enderror">Tanggal Selesai</label>
                                <input type="datetime-local" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                                @error('tanggal_selesai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary rounded-pill"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill">Cek Pendapatan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection