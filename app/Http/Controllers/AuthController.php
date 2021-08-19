<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //
    public function index(Request $request)
    {
    	if($request->session()->has('email')){
    		return redirect('/');
    	}

    	return view('auth/index');
    }

    public function login(Request $request)
    {
    	if($request->session()->has('email')){
    		return redirect('/');
    	}

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // ambil data user yang emailnya sesuai request
        $user = DB::table('users')
                ->where('role_id',2)
                ->where('email',$request->email)
                ->first();

        if($user) {
            if($request->password == $user->password) {
                $request->session()->put('email', $user->email);
                $request->session()->put('id_user', $user->id);
                $request->session()->put('role_id', $user->role_id);
                
                // arahkan ke halaman utama
                return redirect('/');
                
            } else {
                return redirect('/login')->with('error', 'Gagal! Password anda salah.');
            }
        } else {
            return redirect('/login')->with('error', 'Email belum terdaftar, silahkan buat akun.');
        }
    }

    public function registerPage(Request $request)
    {
    	if($request->session()->has('email')){
    		return redirect('/');
    	}

    	return view('auth/register');
    }

    public function register(Request $request)
    {
    	if($request->session()->has('email')){
    		return redirect('/');
    	}

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required',
        ]);

        // insert menggunakan query builder
        DB::table('users')->insert([
            'name' => $request->name, 
            'email' => $request->email, 
            'password' => $request->password, 
            'no_telp' => $request->phone, 
            'role_id' => 2, 
        ]);


    	return redirect('/login')->with('success','Akun berhasil dibuat! Silahkan login.');
    }


    public function logout(Request $request)
    {
        $request->session()->forget(['email', 'role_id', 'id_user']);
        return redirect('/login')->with('success','Anda telah keluar.');
    }
}
