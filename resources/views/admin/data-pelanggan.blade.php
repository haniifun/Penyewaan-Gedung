@extends('layout/main-admin')

@section('main')
<h2 class="text-center"> Data Pelanggan </h2>

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
			<th>Nama</th>
			<th>Email</th>
			<th>Password</th>
			<th>No. telp</th>
			<th>Tindakan</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->password }}</td>
			<td>{{ $user->no_telp }}</td>
			<td>
				<a href="/hapus-pelanggan/{{ $user->id }}" class="btn-danger btn">hapus</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<a href="/tambah-pelanggan" class="btn btn-primary"> Tambah Pelanggan</a>

@endsection