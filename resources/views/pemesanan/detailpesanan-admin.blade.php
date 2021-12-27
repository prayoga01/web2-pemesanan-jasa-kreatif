@extends('layout.main')

@section('content')
<div class="row mt-5">
    <div class="col-6">
        <h5 class="text-center">DETAIL PESANAN</h5>
        <div class="row">
            <div class="col-12 border ">
                <div class="m-4">

                    <form action="/pesanans/{{ $pesanan->id }}" method="POST">
                    @method('patch')
                    @csrf
                        <div class="form-group row mb-2">
                            <label for="idjasa" class="col-4 col-form-label">Id Jasa</label>
                            <div class="col-8">
                                <input type="text" readonly class="form-control-plaintext" id="idjasa" name="id" value="{{ $pesanan->id }}">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="jenispesanan" class="col-4 col-form-label">Jenis Pesanan</label>
                            <div class="col-8">
                                <input type="text" readonly class="form-control-plaintext" id="jenispesanan" name="jenis_pesanan" value="{{ $pesanan->jenis_pesanan }}">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="namapenanggungjawab" class="col-4 col-form-label">Nama Penanggung Jawab</label>
                            <div class="col-8">
                                <input type="text" readonly class="form-control-plaintext" id="namapenanggungjawab" name="penanggungjawab" value="{{ $pesanan->penanggungjawab }}">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="namaperusahaan" class="col-4 col-form-label">Nama Perusahaan</label>
                            <div class="col-8">
                                <input type="text" readonly class="form-control-plaintext" id="namaperusahaan" name="perusahaan" value="{{ $pesanan->perusahaan }}">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="notlppenanggungjawab" class="col-4 col-form-label">No. Tlp Penanggung Jawab</label>
                            <div class="col-8">
                                <input type="text" readonly class="form-control-plaintext" id="notlppenanggungjawab" name="nomor_penanggungjawab" value="{{ $pesanan->nomor_penanggungjawab }}">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="judulproyek" class="col-4 col-form-label">Judul Proyek</label>
                            <div class="col-8">
                                <input type="text" readonly class="form-control-plaintext" id="judulproyek" name="judul_proyek" value="{{ $pesanan->judul_proyek }}">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="deskripsiproyek" class="col-4 col-form-label">Deskripsi Proyek</label>
                            <div class="col-8">
                                <textarea readonly class="form-control-plaintext" id="deskripsiproyek" name="deskripsi" rows="3">{{ $pesanan->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="deadline" class="col-4 col-form-label">Deadline</label>
                            <div class="col-8">
                                <input type="date" readonly class="form-control-plaintext" id="deadline" name="dedline" value="{{ $pesanan->dedline }}">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="limitbudget" class="col-4 col-form-label">Budget</label>
                            <div class="col-8">
                                <input type="text" readonly class="form-control-plaintext" id="limitbudget" name="budget" value="{{ $pesanan->budget }}">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="status" class="col-4 col-form-label">Status</label>
                            <div class="col-8">
                                <input type="text" readonly class="form-control-plaintext" id="status" name="budget" value="{{ $pesanan->status }}">
                            </div>
                        </div>
                        @if (!strcmp($pesanan->status,"menunggu"))
              
                        <button class="btn btn-success" type='submit' name="status" value="Diterima">Accept</button>
                        <button class="btn btn-outline-danger" type='submit' name="status" value="Ditolak">Decline</button>
                            
                        @endif

                        @if (!strcmp($pesanan->status,"Diterima"))
              
                        <button class="btn btn-success" type='submit' name="status" value="Menunggu Payment">Menunggu Payment</button>
                            
                        @endif

                        @if (!strcmp($pesanan->status,"Menunggu Payment"))
              
                        <button class="btn btn-success" type='submit' name="status" value="Dikerjakan">Dikerjakan</button>
                            
                        @endif

                        @if (!strcmp($pesanan->status,"Dikerjakan"))
              
                        <button class="btn btn-success" type='submit' name="status" value="Selesai">Selesai</button>
                            
                        @endif
                        
                        <a class="btn btn-outline-danger" href="/pesanans">Kembali</a>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <img class="mb-4 img-center rounded" src="../profil.jpg" alt="" width="120" height="120">
    </div>

</div>
@endsection