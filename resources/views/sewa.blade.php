@extends('layout/main')

@section('bg-primary', 'bg-primary')

@section('main')

<section style="min-height: 85vh">
	<div class="container mt-5 pt-5">
		<div class="row">
			<!-- card -->
			<div class="card" style="min-height: 75vh">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<img src="/images/{{$gedung->foto}}">
						</div>	
						<div class="col-lg-6 col-md-6">
							<h3 class="py-3">{{$gedung->nama}}</h3>
							<p class="py-2">{{$gedung->deskripsi}}</p>

			                  <div class="row ml-0">
			                      <div class="col-sm-5 btn btn-outline-info mx-1">Luas {{ $gedung->luas }}m<sup>2</sup></div>
			                      <div class="col-sm-5 btn btn-outline-success mx-1">Rp {{ number_format($gedung->harga, 0, ',','.' ) }}</div>
			                  </div>

			                <form action="/sewa" method="post">
			                	<input type="hidden" name="id_gedung" value="{{$gedung->id}}">
			                	@csrf
			                	<div class="form-group py-2">
								    <label for="tanggal">Sewa untuk tanggal : </label>
								    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" min="{{ date('Y-m-d') }}">
								</div>
								@error('tanggal')
		                            <div class="form-group text-danger my-1">{{ $message }}</div>
		                        @enderror
								  <button class="btn btn-block btn-primary" name="checkout">Checkout</button>
							</form>
						</div>	
					</div>	
				</div>
			</div>
			<!-- /end-card -->
		</div>
	</div>
</section>   

@endsection