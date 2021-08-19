@extends('layout/main-admin')

@section('main')
	
<form method="post" action="/tambah-pelanggan">
	@csrf

	<div class="form-group">
		<label> Nama </label>
		<input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" autofocus>
	</div>
    @error('nama')
        <div class="form-group text-danger">{{ $message }}</div>
    @enderror

	<div class="form-group">
		<label>email</label>
		<input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
	</div>
    @error('email')
        <div class="form-group text-danger">{{ $message }}</div>
    @enderror

	<div class="form-group">
		<label>No. Telp</label>
		<input type="number" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror">
	</div>
    @error('no_telp')
        <div class="form-group text-danger">{{ $message }}</div>
    @enderror

	<div class="form-group">
		<label>Password</label>
		<input name="password" class="form-control @error('password') is-invalid @enderror">
	</div>
    @error('password')
        <div class="form-group text-danger">{{ $message }}</div>
    @enderror


	<button class="btn btn-primary" name="ubah">Tambah Pelanggan</button>
</form>

@endsection