<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends ApiController
{
    //
    public function login(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            $user = $request->user();
//            $request->session()->regenerate();
            if ($user != null){
                if ($user->jenis_pengguna === 'pelanggan'){
                    return $this->successResponse($user,'sukses');
                } else {
                    return $this->errorResponse(null,'Username atau Password salah',400);
                }
            } else {
                return $this->errorResponse(null,'Username tidak ada',400);
            }
        }
        return $this->errorResponse(null,'Username tidak ada',400);
    }

    public function register(Request $request){
        $register = User::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'jenis_pengguna' => 'pelanggan',
            'nama_lengkap' => $request->input('nama_lengkap'),
            'no_hp' => $request->input('no_hp'),
            'alamat' => $request->input('alamat'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'tempat_lahir' => $request->input('tempat_lahir'),
        ]);

        if ($register) {
            return $this->successResponse($register,'sukses');
        }

        return $this->errorResponse(null,'gagal',400);
    }
}
