@extends('layout/main-admin')

@section('main')
<h2 class="text-center">Admin</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Password</th>
			<th>No. telp</th>
		</tr>
	</thead>
	<tbody>
		@foreach($admins as $admin)
		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $admin->name }}</td>
			<td>{{ $admin->email }}</td>
			<td>{{ $admin->password }}</td>
			<td>{{ $admin->no_telp }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection