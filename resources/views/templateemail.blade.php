<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ $details['header'] }}</h1>
    <h3><i>Detil Pesanan : </i></h3>
    <p>Judul Pesanan : {{ $details['judul'] }}</p>
    <p>Jenis Pesanan : {{ $details['jenis'] }}</p>
    <p>Budget : Rp. {{ $details['budget'] }}</p>
    <br>
    <br>
    <p style="text-align: center;">Status pesanan berubah menjadi  <b><i>{{ $details['status'] }}</i></b></p>
    <br>
    <br>
    <hr>
    <p style="text-align: center;"><small><i>Jika anda tidak merasa memesan, harap segera hubungi admin di <b>0808080808080</b></i></small></p>
    <hr>
    <br>
</body>
</html>