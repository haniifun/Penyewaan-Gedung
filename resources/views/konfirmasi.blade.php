@extends('layout/main')

@section('bg-primary', 'bg-primary')

@section('main')
<section style="min-height: 85vh">
	<div class="container mt-5 py-5 mb-3">
    <div class=" my-4">
        <h4>Konfirmasi Pembayaran</h4>
    </div>

    <form action="/konfirmasi" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group my-3">
        <label for="gedung">Gedung</label>
        <select id="gedung" name="id_penyewaan" class="form-control">
          @foreach($penyewaan as $row)
            <option value="{{ $row->id }}" 
              @if(($row->id == $selected_id))
                              selected
                            @endif
            >{{ $row->nama }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="bukti-pembayaran">Upload Bukti Pembayaran <span class="text-danger">*(.jpg, .jpeg, .pdf, .png)</span></label>
        <input type="file" class="form-control-file @error('bukti-pembayaran') is-invalid @enderror" id="bukti-pembayaran" name="bukti-pembayaran">
      </div>
      @error('bukti-pembayaran')
          <div class="form-group text-danger">{{ $message }}</div>
      @enderror
      
      <button class="btn btn-primary my-2" type="submit" name="bukti-pembayaran">Upload</button>
    </form>

	</div>
</section>


@endsection