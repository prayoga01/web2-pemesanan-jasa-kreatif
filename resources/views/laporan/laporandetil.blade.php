<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="libraries/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="http://127.0.0.1:8000/css/style.css">

    <style>
        .page_break {
            page-break-before: always;
        }

        .container {
            display: grid;
            grid-template-columns: 150px 150px 150px 150px;
            grid-template-rows: 150px;
            grid-gap: 0rem;
        }

        .item {
            border-radius: 5px;
            border: 1px solid #171717;
        }
    </style>
    <link rel="stylesheet" href="{{ ltrim(public_path('libraries/bootstrap-5.0.2-dist/css/bootstrap.css'), '/') }}" />


    <title>SIMP</title>
</head>

<body>
    <div class="container-fluid">

        <div class="row">
            <div class="col p-0">
                <div class="row pencetak justify-content-center m-0 p-0">
                    <button id="btn-cetak" class="btn btn-primary">Cetak PDF</button>
                </div>
                {{-- KEPALA LAPORAN --}}
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">LAPORAN DETIL</a>

                    </div>
                </nav>
                {{-- KEPALA LAPORAN END --}}
                {{-- Info Laporan --}}

                <div class="row m-3">
                    <div class="col-6">
                        <h2>Tanggal Cetak : {{ date('d/m/Y') }}</h2>
                        <br>

                    </div>
                    <div class="col-6">
                        <p class="text-end mb-0"> {{ auth()->user()->namadepan }} {{ auth()->user()->namabelakang }}
                        </p>
                        <p class="text-end">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                {{-- Info Laporan End --}}

                <hr>
                {{-- List Anggota --}}
                <div class="row mb-3 mt-5">
                    <h5>Detil Proyek</h5>
                </div>
                <div class="row mb-3 justify-content-center">
                    <div class="col-11">
                        <div class="row">
                            <div class="col-12 border ">
                                <div class="m-4">
                
                                    <form action="#" method="POST">
                                    
                                        <div class="form-group row mb-2">
                                            <label for="idjasa" class="col-4 col-form-label">Id Jasa</label>
                                            <div class="col-8">
                                                <input type="text" readonly class="form-control-plaintext" id="idjasa" name="id" value="{{ $pesanan->id }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="jenispesanan" class="col-4 col-form-label">Jenis Pesanan</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control-plaintext" id="jenispesanan" name="jenis_pesanan" value="{{ $pesanan->jenis_pesanan }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="namapenanggungjawab" class="col-4 col-form-label">Nama Penanggung Jawab</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control-plaintext" id="namapenanggungjawab" name="penanggungjawab" value="{{ $pesanan->penanggungjawab }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="namaperusahaan" class="col-4 col-form-label">Nama Perusahaan</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control-plaintext" id="namaperusahaan" name="perusahaan" value="{{ $pesanan->perusahaan }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="notlppenanggungjawab" class="col-4 col-form-label">No. Tlp Penanggung Jawab</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control-plaintext" id="notlppenanggungjawab" name="nomor_penanggungjawab" value="{{ $pesanan->nomor_penanggungjawab }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="judulproyek" class="col-4 col-form-label">Judul Proyek</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control-plaintext" id="judulproyek" name="judul_proyek" value="{{ $pesanan->judul_proyek }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="deskripsiproyek" class="col-4 col-form-label">Deskripsi Proyek</label>
                                            <div class="col-8">
                                                <textarea class="form-control-plaintext" id="deskripsiproyek" name="deskripsi" rows="3">{{ $pesanan->deskripsi }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="deadline" class="col-4 col-form-label">Deadline</label>
                                            <div class="col-8">
                                                <input type="date" class="form-control-plaintext" id="deadline" name="dedline" value="{{ $pesanan->dedline }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="limitbudget" class="col-4 col-form-label">Budget</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control-plaintext" id="limitbudget" name="budget" value="{{ $pesanan->budget }}">
                                            </div>
                                        </div>
                                    </form>
                
                                </div>
                
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row m-3">
                    <div class="col-6">
                        <p> </p>
                    </div>
                    <div class="col-6">
                        <p class="text-end mb-0"> Diketahui </p>
                        <br>
                        <br>
                        <p class="text-end">( {{ auth()->user()->namadepan }} {{ auth()->user()->namabelakang }} )</p>
                    </div>
                </div>
                {{-- List Anggota End --}}
                <hr>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
        $(function(){
            $('.pencetak').on('click',function(){

                const halaman = '/laporans';

                
                $('#btn-cetak').remove();
                print();
                location.href = halaman;
            });

        });
    </script>
</body>

</html>