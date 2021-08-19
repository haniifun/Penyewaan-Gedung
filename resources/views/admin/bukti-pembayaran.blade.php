@extends('layout/main-admin')

@section('main')
<h2>Bukti pembayaran : </h2>
<br>

<img src="/images/bukti-pembayaran/{{ $bukti }}" alt="{{ $bukti }}" width="100%">

@endsection