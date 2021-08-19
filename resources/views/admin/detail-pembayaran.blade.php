@extends('layout/main-admin')

@section('main')
<h2 class="text-center">Detail pembayaran <span class="btn btn-info">{{ $pembayaran->status }}</span></h2>

<table class="table table-bordered">
    <tbody>
        <tr>
          <td width="20%">Nama Penyewa</td>
          <td width="5%">:</td>
          <td width="75%">{{ $pembayaran->name }}</td>
        </tr>
        <tr>
          <td width="20%">Email</td>
          <td width="5%">:</td>
          <td width="75%">{{ $pembayaran->email }}</td>
        </tr>
        <tr>
          <td width="20%">Nomor HP</td>
          <td width="5%">:</td>
          <td width="75%">{{ $pembayaran->no_telp }}</td>
        </tr>
    </tbody>
</table>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Gedung</th>
      <th>Tanggal penyewaan</th>
      <th>Harga</th>
      <th>jumlah</th>
      <th>Subtotal</th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $pembayaran->nama }}</td>
      <td>{{ $pembayaran->tanggal }}</td>
      <td>{{ $pembayaran->harga }}</td>
      <td>1</td>
      <td>
        {{ $pembayaran->harga }}
      </td>
    </tr>
</table>


@endsection