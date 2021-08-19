<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Gedung;

class PenyewaanController extends Controller
{
 	// Home page
    public function index()
    {
 		$gedungs = Gedung::all();   	
    	return view('index', ['gedungs' => $gedungs]);
    }

    // Ke halaman form penyewaan
    public function penyewaan(Request $request, $id)
    {
    	if(!$request->session()->has('email')){
    		return redirect('/login');
    	}


    	$gedung = Gedung::all()->where('id', $id)->first();

    	return view('sewa', compact('gedung'));
    }

    // simpan data penyewaan
    public function sewa(Request $request)
    {
    	if(!$request->session()->has('email')){
    		return redirect('/login');
    	}

    	$request->validate([
    		'tanggal' => 'required|date'
    	]);

    	$gedung = Gedung::all()->where('id', $request->id_gedung)->first();

    	DB::table('penyewaan')->insert([
            'id_gedung' => $gedung->id, 
            'id_user' => $request->session()->get('id_user'),
            'tanggal' => $request->tanggal, 
            'total_pembayaran' => $gedung->harga, 
            'status' => 'Belum bayar', 
        ]);

    	// ambil id_penyewaan terbaru
    	$id_penyewaan = DB::table('penyewaan')->max('id');
    	return redirect('/invoice/'.$id_penyewaan);
    }

    // ke halaman history penyewaan
    public function history(Request $request)
    {
    	if(!$request->session()->has('email')){
    		return redirect('/login');
    	}

    	$id_user = $request->session()->get('id_user');

    	$penyewaan = DB::table('penyewaan')
                    ->join('gedung', 'gedung.id', '=', 'penyewaan.id_gedung')
                    ->select('penyewaan.*','gedung.nama','gedung.harga','gedung.luas','gedung.deskripsi')
                    ->where('id_user', $id_user)
                    ->get();

    	return view('/history', ['penyewaan' => $penyewaan, 'no' => 1]);
    }

    // ke halaman history penyewaan
    public function invoice(Request $request, $id)
    {
    	if(!$request->session()->has('email')){
    		return redirect('/login');
    	}

    	$id_user = $request->session()->get('id_user');

    	$penyewaan = DB::table('penyewaan')
                    ->join('gedung', 'gedung.id', '=', 'penyewaan.id_gedung')
                    ->join('users', 'users.id', '=', 'penyewaan.id_user')
                    ->select('penyewaan.*','gedung.*', 'users.*')
                    ->where('penyewaan.id', $id)
                    ->first();

    	return view('/invoice', compact('penyewaan'));
    }

    // ke halaman konfirmasi pembayaran
    public function konfirmasi(Request $request, $id)
    {
    	if(!$request->session()->has('email')){
    		return redirect('/login');
    	}

    	$id_user = $id_user = $request->session()->get('id_user');
    	$penyewaan = DB::table('penyewaan')
                    ->join('gedung', 'gedung.id', '=', 'penyewaan.id_gedung')
                    ->select('penyewaan.*','gedung.nama','gedung.harga','gedung.luas','gedung.deskripsi')
                    ->where('id_user', $id_user)
                    ->get();


        return view('/konfirmasi', ['penyewaan' => $penyewaan, 'selected_id' => $id]);


    }

    // Upload bukti pembayaran 
    public function uploadBukti(Request $request)
    {
    	if(!$request->session()->has('email')){
    		return redirect('/login');
    	}

    	$request->validate([
    		'bukti-pembayaran' => 'required|file|image|mimes:jpeg,png,jpg,pdf'
    	]);


        $file = $request->file('bukti-pembayaran');
        $nama_file = "bukti_".time()."_".$file->getClientOriginalName();

        // simpan gambar
        $file->move('images/bukti-pembayaran/', $nama_file);


        // insert data bukti pembayaran ke tabel konfirmasi-pembayaran
        DB::table('konfirmasi_pembayaran')->insert([
        	'id_penyewaan' => $request->id_penyewaan,
        	'bukti_pembayaran' => $nama_file
        ]);

        // ubah status menja
        DB::table('penyewaan')
              ->where('id', $request->id_penyewaan)
              ->update([
                    'status' => 'Lunas', 
                ]);
        return redirect('/history')->with('success','Lunas! Bukti pembayaran berhasil diupload.');

    }

    

    
}

