@extends('layout/main-admin')

@section('main')
<h2 class="text-center">Detail Penyewaan</h2>

<table class="table table-bordered">
    <tbody>
        <tr>
          <td width="20%">Nama Penyewa</td>
          <td width="5%">:</td>
          <td width="75%">{{ $penyewaan->name }}</td>
        </tr>
        <tr>
          <td width="20%">Email</td>
          <td width="5%">:</td>
          <td width="75%">{{ $penyewaan->email }}</td>
        </tr>
        <tr>
          <td width="20%">Nomor HP</td>
          <td width="5%">:</td>
          <td width="75%">{{ $penyewaan->no_telp }}</td>
        </tr>
    </tbody>
</table>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Gedung</th>
      <th>Tanggal Penyewaan</th>
      <th>Harga</th>
      <th>jumlah</th>
      <th>Subtotal</th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $penyewaan->nama }}</td>
      <td>{{ $penyewaan->tanggal }}</td>
      <td>{{ $penyewaan->harga }}</td>
      <td>1</td>
      <td>
        {{ $penyewaan->harga }}
      </td>
    </tr>
</table>


@endsection