@extends('layout/main-admin')

@section('main')
	
<form method="post" action="/ubah-data-gedung" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="id_gedung" value="{{ $gedung->id }}">

	<div class="form-group">
		<label> Nama Gedung </label>
		<input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $gedung->nama }}">
	</div>
    @error('nama')
        <div class="form-group text-danger">{{ $message }}</div>
    @enderror

	<div class="form-group">
		<label> Harga (Rp) </label>
		<input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ $gedung->harga }}">
	</div>
    @error('harga')
        <div class="form-group text-danger">{{ $message }}</div>
    @enderror

	<div class="form-group">
		<label> Luas (m<sup>2</sup>) </label>
		<input type="number" name="luas" class="form-control @error('luas') is-invalid @enderror" value="{{ $gedung->luas }}">
	</div>
    @error('luas')
        <div class="form-group text-danger">{{ $message }}</div>
    @enderror

	<div class="form-group">
		<img src="/images/{{ $gedung->foto }}" width="200">
	</div>
	<div class="form-group">
		<label>Ganti foto </label>
		<input type="file" name="foto" class="form-group @error('foto') is-invalid @enderror">
	</div>
    @error('foto')
        <div class="form-group text-danger">{{ $message }}</div>
    @enderror

	<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5">{{ $gedung->deskripsi }}</textarea>
	</div>
    @error('deskripsi')
        <div class="form-group text-danger">{{ $message }}</div>
    @enderror

	<button class="btn btn-primary" name="ubah">Ubah data gedung</button>
</form>

@endsection