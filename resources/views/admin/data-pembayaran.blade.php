@extends('layout/main-admin')

@section('main')

<h2 class="text-center"> Data Pembayaran </h2>


<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Bukti Pembayaran</th>
			<th>Gedung</th>
			<th>Pelanggan</th>
			<th>status</th>
			<th>Tindakan</th>
		</tr>
	</thead>
  <tbody>
  	@foreach($pembayaran as $row)
	    <tr>
	      <th scope="row">{{$no++}}</th>
	      <td><?= ($row->status == "Lunas") ? '<a href="/bukti-pembayaran/'.$row->id.'" class="btn btn-success btn-sm">Cek bukti pembayaran</a>' : $row->status ?> </td>
	      <td>{{ $row->nama}}</td>
	      <td>{{ $row->name}}</td>
	      <td>{{ $row->status}}</td>
	      <td>
	        <a href="/detail-pembayaran/{{$row->id}}" class="btn btn-info py-2 ">Detail</a>
	      </td>
	    </tr>
  	@endforeach
  </tbody>
</table>


@endsection