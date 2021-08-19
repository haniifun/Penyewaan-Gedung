<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Gedung;
use App\User;



class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        // jika belum login
        if(!$request->session()->has('email')){
            return redirect('/admin/login');
        }

        // jika bukan sebagia admin
        if($request->session()->get('role_id') != 1){
            return redirect('/');
        }

        $admins = User::all()->where('role_id', 1);
        return view('admin/index', ['admins' => $admins, 'no' => 1]);
    }


/* ==========================================================
    Login Admin
=========================================================== */
    
    // ke halaman login
    public function loginPage(Request $request)
    {
        if($request->session()->has('email')){
            return redirect('/admin');
        }

        return view('admin/login');
    }


    public function login(Request $request)
    {
        if($request->session()->has('email')){
            return redirect('/admin');
        }

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // ambil data user yang emailnya sesuai request
        $user = DB::table('users')
                ->where('role_id',1)
                ->where('email',$request->email)
                ->first();

        if($user) {
            if($request->password == $user->password) {
                $request->session()->put('email', $user->email);
                $request->session()->put('id_user', $user->id);
                $request->session()->put('role_id', $user->role_id);
                
                // arahkan ke halaman utama
                return redirect('/admin');
                
            } else {
                return redirect('/admin/login')->with('error', 'Gagal! Password anda salah.');
            }
        } else {
            return redirect('/admin/login')->with('error', 'Email belum terdaftar, silahkan buat akun.');
        }
    }

/* End login admin
============================================================ */


/* ===========================================================
    CRUD data gedung
=============================================================*/

    // Menampilkan data gedung
    public function dataGedung(Request $request)
    {
        // jika belum login
        if(!$request->session()->has('email')){
            return redirect('/admin/login');
        }
        
        // jika bukan sebagia admin
        if($request->session()->get('role_id') != 1){
            return redirect('/');
        }

        // ambil data gedung menggunakan eloquent
        $gedungs = Gedung::all();

        return view('admin/data-gedung', ['gedungs' => $gedungs, 'no' => 1]);
    }

    // ke halaman tambah gedung
    public function tambahGedung(Request $request) 
    {
        // jika belum login
        if(!$request->session()->has('email')){
            return redirect('/admin/login');
        }

        // jika bukan sebagia admin
        if($request->session()->get('role_id') != 1){
            return redirect('/');
        }

        return view('admin/tambah-gedung');
    }

    // simpan gedung yang ditambahkan
    public function simpanData(Request $request) 
    {
        // jika belum login
        if(!$request->session()->has('email')){
            return redirect('/admin/login');
        }

        // jika bukan sebagia admin
        if($request->session()->get('role_id') != 1){
            return redirect('/');
        }

        // validasi input
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required|numeric',
            'luas' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);



        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();

        // simpan gambar
        $file->move('images/', $nama_file);

        // insert menggunakan query builder
        DB::table('gedung')->insert([
            'nama' => $request->nama, 
            'harga' => $request->harga, 
            'luas' => $request->luas, 
            'deskripsi' => $request->deskripsi, 
            'foto' => $nama_file, 
        ]);

        return redirect('/data-gedung')->with('status','Data berhasil ditambahkan!');
    }
    
    // Menampilkan data gedung
    public function editGedung(Request $request, $id)
    {
        // jika belum login
        if(!$request->session()->has('email')){
            return redirect('/admin/login');
        }

        // jika bukan sebagia admin
        if($request->session()->get('role_id') != 1){
            return redirect('/');
        }

        // ambil data gedung menggunakan eloquent
        $gedung = Gedung::all()->where('id', $id)->first();

        return view('admin/edit-gedung', compact('gedung'));
    }

    // Update data gedung
    public function updateGedung(Request $request)
    {
        // jika belum login
        if(!$request->session()->has('email')){
            return redirect('/admin/login');
        }

        // jika bukan sebagia admin
        if($request->session()->get('role_id') != 1){
            return redirect('/');
        }

        // validasi input
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required|numeric',
            'luas' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        $id = $request->id_gedung;
        $foto_gedung = Gedung::all()->where('id', $id)->first()->foto;

        if ($request->hasFile('foto')) {
            $this->validate($request, [
                'foto' => 'file|image|mimes:jpeg,png,jpg',
            ]);

            // menangkap input file foto
            $file = $request->file('foto');

            $nama_foto = time()."_".$file->getClientOriginalName();

            // simpan gambar
            $file->move('images/', $nama_foto);

            // cek apakah ada file foto tersebut dalam folder
            if(file_exists(storage_path('../public/images/').$foto_gedung))
            {
                // hapus foto dalam folder images
                unlink(storage_path('../public/images/'.$foto_gedung));
            }
        } else {
            $nama_foto = $foto_gedung;
        }


        // update data
        DB::table('gedung')
              ->where('id', $id)
              ->update([
                    'nama' => $request->nama, 
                    'harga' => $request->harga, 
                    'luas' => $request->luas, 
                    'foto' => $nama_foto, 
                    'deskripsi' => $request->deskripsi, 
                ]);

        return redirect('/data-gedung')->with('success','Data gedung berhasil diubah.');
    }

    // Hapus data
    public function hapusGedung(Request $request, $id) 
    {
        // jika belum login
        if(!$request->session()->has('email')){
            return redirect('/admin/login');
        }

        // jika bukan sebagia admin
        if($request->session()->get('role_id') != 1){
            return redirect('/');
        }

        // ambil nama foto 
        $foto = Gedung::all()->where('id', $id)->first()->foto;

        // hapus gedung di database
        Gedung::where('id', $id)->delete();

        // jika ada foto pada folder images
        if (file_exists(storage_path('../public/images/').$foto))
        {
            // hapus foto dalam folder images
            unlink(storage_path('../public/images/'.$foto));
        }

        return redirect('/data-gedung')->with('success','Data gedung berhasil dihapus');
    }

/* End Gedung
============================================================================*/

/* ===========================================================
    Data Pelanggan/user
=============================================================*/

    // Menampilkan data pelanggan
    public function dataPelanggan(Request $request)
    {
        // jika belum login
        if(!$request->session()->has('email')){
            return redirect('/admin/login');
        }

        // jika bukan sebagia admin
        if($request->session()->get('role_id') != 1){
            return redirect('/');
        }

        // ambil data users yang sebagai customer/pelanggan (role_id = 2)
        $users = User::all()->where('role_id', 2);

        return view('admin/data-pelanggan', ['users' => $users, 'no' => 1]);
    }

        // ke halaman tambah pelanggan
    public function tambahPelanggan(Request $request) 
    {
        // jika belum login
        if(!$request->session()->has('email')){
            return redirect('/admin/login');
        }

        // jika bukan sebagia admin
        if($request->session()->get('role_id') != 1){
            return redirect('/');
        }

        return view('admin/tambah-pelanggan');
    }

    // simpan pelanggan yang ditambahkan
    public function simpanDataPelanggan(Request $request) 
    {
        // jika belum login
        if(!$request->session()->has('email')){
            return redirect('/admin/login');
        }

        // jika bukan sebagia admin
        if($request->session()->get('role_id') != 1){
            return redirect('/');
        }

        // validasi input
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required|numeric',
            'password' => 'required',
        ]);

        // insert menggunakan query builder
        DB::table('users')->insert([
            'name' => $request->nama, 
            'email' => $request->email, 
            'no_telp' => $request->no_telp, 
            'password' => $request->password, 
            'role_id' => 2, 
        ]);

        return redirect('/data-pelanggan')->with('success','Data pelanggan berhasil ditambahkan!');
    }


    // Hapus data
    public function hapusPelanggan(Request $request, $id) 
    {
        // jika belum login
        if(!$request->session()->has('email')){
            return redirect('/admin/login');
        }

        // jika bukan sebagia admin
        if($request->session()->get('role_id') != 1){
            return redirect('/');
        }

        // hapus user di database
        User::where('id', $id)->delete();

        return redirect('/data-pelanggan')->with('success','Data pelanggan berhasil dihapus');
    }

/* End data user
============================================================= */


/* ====================================================================
    Data Penyewaan
=======================================================================*/

    // Menampilkan data penyewaan
    public function dataPenyewaan(Request $request)
    {
        // jika belum login
        if(!$request->session()->has('email')){
            return redirect('/admin/login');
        }

        // jika bukan sebagia admin
        if($request->session()->get('role_id') != 1){
            return redirect('/');
        }


        // ambil data penyewaan
        $penyewaan = DB::table('penyewaan')
                    ->join('users', 'users.id', '=', 'penyewaan.id_user')
                    ->select('penyewaan.*','users.name')
                    ->get();

        return view('admin/data-penyewaan', ['penyewaan' => $penyewaan, 'no' => 1]);
    }

    // Menampilkan detail data penyewaan
    public function detailPenyewaan(Request $request, $id)
    {
        // jika belum login
        if(!$request->session()->has('email')){
            return redirect('/admin/login');
        }

        // jika bukan sebagia admin
        if($request->session()->get('role_id') != 1){
            return redirect('/');
        }


        // ambil data penyewaan
        $penyewaan = DB::table('penyewaan')
                    ->join('users', 'users.id', '=', 'penyewaan.id_user')
                    ->join('gedung', 'gedung.id', '=', 'penyewaan.id_gedung')
                    ->select('penyewaan.*','users.name','users.email','users.no_telp', 'gedung.nama','gedung.harga')
                    ->where('penyewaan.id', $id )
                    ->first();

        return view('admin/detail-penyewaan', ['penyewaan' => $penyewaan, 'no' => 1]);
    }

/* End data penyewaan 
============================================================================*/

/* ========================================================================
    Data pembayaran
========================================================================== */

    // Menampilkan data pembayaran
    public function dataPembayaran(Request $request)
    {
        // jika belum login
        if(!$request->session()->has('email')){
            return redirect('/admin/login');
        }

        // jika bukan sebagia admin
        if($request->session()->get('role_id') != 1){
            return redirect('/');
        }


        // ambil data pembayaran
        $pembayaran = DB::table('penyewaan')
                    ->join('users', 'users.id', '=', 'penyewaan.id_user')
                    ->join('gedung', 'gedung.id', '=', 'penyewaan.id_gedung')
                    ->select('penyewaan.*','users.name', 'gedung.nama')
                    ->get();

        return view('admin/data-pembayaran', ['pembayaran' => $pembayaran, 'no' => 1]);
    }

    // Menampilkan detail data pembayaran
    public function detailPembayaran(Request $request, $id)
    {
        // jika belum login
        if(!$request->session()->has('email')){
            return redirect('/admin/login');
        }

        // jika bukan sebagia admin
        if($request->session()->get('role_id') != 1){
            return redirect('/');
        }


        // ambil data pembayaran
        $pembayaran = DB::table('penyewaan')
                    ->join('users', 'users.id', '=', 'penyewaan.id_user')
                    ->join('gedung', 'gedung.id', '=', 'penyewaan.id_gedung')
                    ->select('penyewaan.*','users.name','users.email','users.no_telp', 'gedung.nama','gedung.harga')
                    ->where('penyewaan.id', $id )
                    ->first();

        return view('admin/detail-pembayaran', ['pembayaran' => $pembayaran, 'no' => 1]);
    }

    public function buktiPembayaran(Request $request, $id)
    {
        // jika belum login
        if(!$request->session()->has('email')){
            return redirect('/admin/login');
        }

        // jika bukan sebagia admin
        if($request->session()->get('role_id') != 1){
            return redirect('/');
        }


        // ambil data pembayaran
        $bukti_pembayaran = DB::table('konfirmasi_pembayaran')->where('id_penyewaan',$id)->first()->bukti_pembayaran;

        return view('admin/bukti-pembayaran', ['bukti' => $bukti_pembayaran]);
    }


}
