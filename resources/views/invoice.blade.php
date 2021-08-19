@extends('layout/main')

@section('bg-primary', 'bg-primary')

@section('main')
<section style="min-height: 85vh">
	<div class="container mt-5 py-5 mb-3">
        <div class="text-center my-4">
            <h4 class="my-2">INVOICE</h4>
            <p>[{{$penyewaan->status}}]</p>
        </div>
		<table class="table table-striped table-responsive-md">
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
                <tr>
                  <td colspan="3"></td>
                </tr>
                <tr>
                  <td>Nama Gedung</td>
                  <td>:</td>
                  <td>{{ $penyewaan->nama }}</td>
                </tr>
                <tr>
                  <td>Deskripsi</td>
                  <td>:</td>
                  <td>{{ $penyewaan->deskripsi }}</td>
                </tr>
                <tr>
                  <td>Luas</td>
                  <td>:</td>
                  <td>{{ $penyewaan->luas }} m<sup>2</sup></td>
                </tr>
                <tr>
                  <td>Harga Sewa</td>
                  <td>:</td>
                  <td>Rp {{ number_format($penyewaan->harga, 0, ',', '.') }}</td>
                </tr>
                <tr>
                  <td>Disewa untuk tanggal</td>
                  <td>:</td>
                  <td>{{ $penyewaan->tanggal }}</td>
                </tr>
                <tr>
                  <td colspan="3"class="bg-info"><h4 class="text-white float-right px-3">Total Harga : Rp {{ number_format($penyewaan->total_pembayaran, 0, ',', '.')}}</h4></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">
                        <h5 class="py-2">Pembayaran ditranfer ke rekening</h5>
                        <p>BANK .....</p>
                        <p>000000000000000000000</p>
                        <p>a.n</p>
                        <p>Pemilik Rekening</p>
                    </td>
                </tr>
            </tbody>
        </table>

        <a href="/konfirmasi/{{$penyewaan->id}}" class="btn btn-block btn-primary font-weight-bold py-2 ">Konfirmasi Pembayaran</a>
        <a href="/history" class="btn btn-block btn-dark font-weight-bold py-2 ">History Penyewaan</a>
	</div>
</section>


@endsection