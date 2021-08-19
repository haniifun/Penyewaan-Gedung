@extends('layout/main-admin')

@section('main')

<h2 class="text-center"> Data Penyewaan </h2>


<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal Penyewaan</th>
			<th>Total Pembayaran</th>
			<th>Tindakan</th>
		</tr>
	</thead>
  <tbody>
  	@foreach($penyewaan as $row)
	    <tr>
	      <th scope="row">{{$no++}}</th>
	      <td>{{ $row->name}}</td>
	      <td>{{ $row->tanggal}}</td>
	      <td>Rp {{ number_format($row->total_pembayaran, 0, ',', '.')}}</td>
	      <td>
	        <a href="/detail-penyewaan/{{$row->id}}" class="btn btn-info py-2 ">Detail</a>
	      </td>
	    </tr>
  	@endforeach
  </tbody>
</table>


@endsection