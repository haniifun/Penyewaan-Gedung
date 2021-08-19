@extends('layout/main-admin')

@section('main')
<h2 class="text-center"> Data Gedung </h2>

<!-- alert sukses-->
<div>
@if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
@endif  
</div>
<!-- end-alert    -->

<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>Nama gedung</th>
			<th>harga</th>
			<th>luas</th>
			<th>foto</th>
			<th width="35%">deskripsi gedung</th>
			<th>Pilih</th>
		</tr>
	</thead>
	<tbody>
		@foreach($gedungs as $gedung)
		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $gedung->nama }}</td>
			<td>Rp {{ number_format($gedung->harga, 0, ',','.') }}</td>
			<td>{{ $gedung->luas }}</td>
			<td>
				<img src="/images/{{ $gedung->foto }}" width="100px">
			</td>
			<td>{{ $gedung->deskripsi }}</td>
			<td>
				<a href="/ubah-data-gedung/{{ $gedung->id }}" class="btn btn-primary">Ubah</a>
				<a href="/hapus-gedung/{{ $gedung->id }}" class="btn-danger btn">hapus</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<a href="/tambah-gedung" class="btn btn-primary"> Tambah Gedung</a>

@endsection