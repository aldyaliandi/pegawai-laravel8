<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD LARAVEL 8</title>
  </head>
  <body> <center>
    <h1 class="tect-container mb-4">Data Pegawai</h1></center>

    <div class="container">
      
    <div class="col-auto">
      <a href="/exportpdf" class="btn btn-info">Export PDF</a>
    </div>

    <div></div>

    <div class="col-auto">
      <a href="/exportword" class="btn btn-warning">Export WORD</a>
    </div>

    <a href="/tambahpegawai" class="btn btn-success">Tambah Data</a>
        <div class="row">
          @if ($message = Session::get('success'))
          <div class="alert alert-primary" role="alert">
            {{ $message }}
          </div>
          @endif
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">No HP</th>
      <th scope="col">Email Aktif</th>
      <th scope="col">Current Salary</th>
      <th scope="col">Foto Profil</th>
      <th scope="col">Di Buat</th>
      <th scope="col">Aksi </th>
    </tr>
  </thead>
  <tbody>
    @php
      $no = 1;
    @endphp
      @foreach ($data as $row)
      <tr>
      <th scope="row">{{ $no++ }}</th>
      <td>{{ $row->nama }}</td>
      <td>{{ $row->jk }}</td>
      <td>0{{ $row->no }}</td>
      <td>{{ $row->email }}</td>
      <td>{{ $row->salary }}</td>
      <td>
        <img src="{{ asset('fotopegawai/'.$row->foto)}}" alt="" style="width: 40px;">
      </td>
      <!-- <td>{{ $row->created_at->format('D M Y') }}</td> -->
      <td>{{ $row->created_at->diffForHumans() }}</td>
      <td>
      <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
      <a href="#" class="btn btn-outline-danger delete" data-id="{{ $row->id }}"data-nama="{{ $row->nama }}" >Delete</a>
      </td>
    </tr>
      @endforeach
    
   
  </tbody>
</table>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
    swal("Hi, Saya Aldy Hysam Aliandi!", "Apa kabar hari ini?");
  </script>
  <script>

$('.delete').click( function(){
    var pegawaiid = $(this).attr('data-id');
    var nama = $(this).attr('data-nama');

 
  swal({
  title: "Pasti ?",
  text: "Kamu akan menghapus data pegawai dengan nama "+nama+"",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    window.location = "/delete/"+pegawaiid+""
    swal("Selamat! Data berhasil dihapus!", {
      icon: "success",
    });
  } else {
    swal("Data Batal Di Hapus!");
  }
});

  });

    
  </script>
</html>