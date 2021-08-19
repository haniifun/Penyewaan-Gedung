@extends('layout/main')

@section('bg-primary', 'bg-primary')

@section('main')
<section style="min-height: 85vh">
	<div class="container mt-5 py-5 mb-3">
        <div class="text-center my-4">
            <h4>History Penyewaan</h4>
        </div>

             <!-- alert sukses-->
        <div>
        @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
        @endif  
        </div>
        <!-- end-alert    -->
        
		<table class="table table-striped table-hover">
		  <thead>
		    <tr>
		      <th scope="col" width="5%">No.</th>
		      <th scope="col" width="25%">Nama Gedung</th>
		      <th scope="col" width="15%">Tanggal Penyewaan</th>
		      <th scope="col" width="15%">Harga</th>
		      <th scope="col" width="20%">Status</th>
		      <th scope="col" width="20%">Tindakan</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($penyewaan as $row)
			    <tr>
			      <th scope="row">{{$no++}}</th>
			      <td>{{ $row->nama}}</td>
			      <td>{{ $row->tanggal}}</td>
			      <td>Rp {{ number_format($row->total_pembayaran, 0, ',', '.')}}</td>
			      <td>{{ $row->status}}</td>
			      <td>
			        <a href="/invoice/{{$row->id}}" class="btn btn-info py-2 ">Invoice</a>
			        <a href="/konfirmasi/{{$row->id}}" class="btn btn-primary py-2 ">Bayar</a>
			      </td>
			    </tr>
		  	@endforeach
		  </tbody>
		</table>

	</div>
</section>


@endsection