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
        <h2 class="text-center mb-4">Data Peminjaman Buku</h2>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Peminjam</th>
                <th scope="col">Buku</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Start date</th>
                <th scope="col">End date</th>
              </tr>
            </thead>
            <tbody>
              <?php $i= $borrowing->firstItem();?>
              @foreach ($borrowing as $item)
                  
              <tr>
                <td scope="row">{{ $i }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->buku->judul }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->tanggal_pinjam }}</td>
                <td>{{ $item->tanggal_kembali }}</td>
              </tr>
              <?php $i++ ?>
              @endforeach
            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        window.print()
    </script>
  </body>
</html>