<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@200..800&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Libre Barcode 39' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('assetsad/css/style.css') }}">
  </head>
  <body>
    <div class="container py-5">
      <div class="card">
        <div class="container text-center pt-4">
          <h3>RECEIPT E-PERPUS</h3>
          <hr class="dashed">
          
        </div>
        <div class="container">
          <h4>Peminjam : {{ $books->user->name }}</h4>
          <h4>Start Date : {{ $books->tanggal_pinjam }}</h4>
          <h4>End Date : {{ $books->tanggal_kembali }}</h4>
          <hr class="dashed">
        </div>
        <div class="container">
          <div class="row">
            <div class="col"><h5>{{ $books->buku->judul }}</h5></div>
            <div class="col right"><h5>{{ $books->jumlah }}</h5></div>
          </div>
          
          <hr class="dashed">
        </div>
        <div class="container text-center pt-4">
          <h1 class="barcode">Libre Barcode 39</h1>
          <h3>No. 089075990</h3>
          <hr class="dashed">
          
        </div>
        
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        window.print()
    </script>
  </body>
</html>