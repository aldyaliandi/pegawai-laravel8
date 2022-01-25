<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
          <center>
      <h1>Laporan Data Pegawai</h1>
          </center>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>No HP</th>
    <th>Email</th>
    <th>Salary</th>
    <th>Foto Profil</th>
  </tr>
  @php
    $no=1;
  @endphp
  @foreach ($data as $row)
      <tr>
        <th>{{ $no++ }}</th>
      <td>{{ $row->nama }}</td>
      <td>{{ $row->jk }}</td>
      <td>0{{ $row->no }}</td>
      <td>{{ $row->email }}</td>
      <td>{{ $row->salary }}</td>
      <td>
        <img src="{{ asset('fotopegawai/'.$row->foto)}}" alt="" style="width: 40px;">
      </td>
  </tr>
  @endforeach
</table>
</body>
</html>