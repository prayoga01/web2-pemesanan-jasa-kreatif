<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

  <title>Hello, world!</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="/dashboard">LOGO</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/dashboard">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pesanans/create">Pesan Jasa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">Tentang</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link " href="/pesanans" tabindex="-1" >Daftar Pesanan</a>
          </li>
          @endauth
        </ul>
        <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle"></i> {{ auth()->user()->namadepan }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">LogOut</button>
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item me-3">
            <a href="/login" class="nav-link border border-1 rounded-pill">LOGIN</a>
          </li>
          <li class="nav-item">
            <a href="/registrasi" class="nav-link border border-primary rounded-pill">REGISTER</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="myScript.js"></script>
</body>

</html>