@extends('layout/main')

@section('main')
    <!--====== NAVBAR TWO PART ENDS ======-->
    <section style="background-image: url('/images/gedung.jpg'); background-repeat: no-repeat; size: cover; background-position: center">
    	<div class="container py-5">
    		<div class="py-5">
	    		<div class="row justify-content-center my-5 py-5">
	    			<div class="col my-5 py-5 text-center">
	    				<h2 class="text-white text-center py-4 font-weight-bold">Butuh Gedung Untuk Acara?</h2>
	    				<a class="btn btn-light text-center font-weight-bold px-5 py-2 text-primary" href="#pricing">Klik disini!</a>
	    			</div>	
	    		</div>
    		</div>
    	</div>
    </section>

    <section id="pricing" class="pricing-area mt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-25">
                        <h3 class="title">Pilihan Gedung</h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->


            <div class="card">
                <div class="card-body">
    		      <div class="row justify-content-center">
                        
                    @foreach($gedungs as $gedung)
                    <div class="col-lg-4 col-md-6 my-2">
                        <div class="card">
                            <img class="card-img-top" src="/images/{{$gedung->foto}}" alt="{{$gedung->foto}}" height="200vh">
                            <div class="card-body">
                              <h5 class="card-title">{{$gedung->nama}}</h5>
                              <p class="card-text small">{{$gedung->deskripsi}}</p>
                              <div class="row mt-2 justify-content-center">

                                  <div class="col-sm-5 btn btn-outline-info mr-1">Luas {{$gedung->luas}}m<sup>2</sup></div>
                                  <div class="col-sm-5 btn btn-outline-success ml-1">Rp {{ number_format($gedung->harga, 0, ',', '.')}}</div>
                              </div>
                            </div>
                            <div class="card-footer p-0">
                                <a href="/sewa/{{$gedung->id}}" class="btn btn-block btn-primary">Sewa sekarang</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  </div>
                </div>
    		</div>

        </div> <!-- container -->
    </section>

    <!--====== PRINICNG ENDS ======-->
@endsection
    