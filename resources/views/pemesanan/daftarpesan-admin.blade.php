@extends('layout.main')

@section('content')
<div class="row mt-4">
<div class="col-md-4 justify-content-center">
<div class="row justify-content-center">
    <div class="col-6">
        <img class="mb-4 img-center rounded" src="profil.jpg" alt="" width="120" height="120">
    </div>
</div>
</div>

<div class="col-md-8">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul Proyek</th>
      <th scope="col">Status</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Aksi</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($pesanans as $pesanan)
        <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $pesanan->judul_proyek }}</td>
        <td>{{ $pesanan->status }}</td>
        <td>{{ $pesanan->deskripsi }}</td>
        <td>
          <div class="d-flex flex-row">
            <div class="p2 me-2">
              <form clas="d-inline" method='POST' action="/pesanans/{{ $pesanan->id }}">
              @method('PATCH')
              @csrf
              <input type='hidden' name="id" value="{{ $pesanan->id }}">
                <button class="btn btn-success" type='submit' name="status" value="Diterima">Accept</button>
                <button class="btn btn-outline-danger" type='submit' name="status" value="Ditolak">Decline</button>
              </form>
            </div>
            <div class="p2">
              <a class="btn btn-primary" href="/pesanans/{{ $pesanan->id }}">Detail</a>
            </div>
          </div>
        </td>
        </tr>   
    @endforeach
    
  </tbody>
</table>
@endsection