<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()){
            if (Auth::user()->jenis_pengguna === 'pemilik'){
                return Redirect::route('user.dashboard');
            }elseif (Auth::user()->jenis_pengguna === 'admin-pengelola'){
                return Redirect::route('admin.dashboard');
            }
        }
        return view('backend.auth.login');
    }

    public function authenticate(Request $request)
    {
         if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
             $user = $request->user();
             $request->session()->regenerate();
             if ($user->jenis_pengguna === 'pemilik'){
                 return Redirect::route('user.dashboard')->with('info','Selamat Datang '.$user->nama_lengkap);
             }elseif ($user->jenis_pengguna === 'admin-pengelola'){
                 return Redirect::route('admin.dashboard')->with('info','Selamat Datang '.$user->nama_lengkap);
             }
         }
         return Redirect::route('auth.login')->with('error','Username dan Password tidak valid');
    }

    public function signup()
    {
        return view('backend.auth.register');
    }

    public function register(Request $request)
    {
        $register = User::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'jenis_pengguna' => 'pemilik',
            'nama_lengkap' => $request->input('nama_lengkap'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'kota_asal' => $request->input('kota_asal'),
            'status' => $request->input('status'),
            'no_hp' => $request->input('no_hp'),
        ]);

        if ($register){
            return Redirect::route('auth.login')->with('info','Silahkan masuk menggunakan akun anda');
        }

        return Redirect::back()->with('error','Ada masalah saat melakukan registrasi');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return Redirect::route('auth.login');
    }
}
