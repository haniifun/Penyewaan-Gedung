@extends('layout/main-admin')

@section('main')
	
<form method="post" action="/tambah-gedung" enctype="multipart/form-data">
	@csrf

	<div class="form-group">
		<label> Nama Gedung </label>
		<input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="">
	</div>
    @error('nama')
        <div class="form-group text-danger">{{ $message }}</div>
    @enderror

	<div class="form-group">
		<label> Harga (Rp) </label>
		<input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="">
	</div>
    @error('harga')
        <div class="form-group text-danger">{{ $message }}</div>
    @enderror

	<div class="form-group">
		<label> Luas (m<sup>2</sup>) </label>
		<input type="number" name="luas" class="form-control @error('luas') is-invalid @enderror" value="">
	</div>
    @error('luas')
        <div class="form-group text-danger">{{ $message }}</div>
    @enderror

	<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5"></textarea>
	</div>
    @error('deskripsi')
        <div class="form-group text-danger">{{ $message }}</div>
    @enderror

	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-group @error('foto') is-invalid @enderror">
	</div>
    @error('foto')
        <div class="form-group text-danger">{{ $message }}</div>
    @enderror

	<button class="btn btn-primary" name="ubah">Tambah data gedung</button>
</form>

@endsection