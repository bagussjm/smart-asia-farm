<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    //
    public function login(Request $request){
        $user = User::all()
            ->where('email','=',$request->input('email'))
            ->where('jenis_pengguna','=','pencari')
            ->first();
        if ($user != null){
            if (Hash::check($request->input('password'),$user->password) == true) {
                $response = [
                    'code' => 200,
                    'status' => 'success',
                    'data' => $user
                ];
            } else {
                $response = [
                    'code' => 400,
                    'status' => 'Username atau Password salah',
                    'data' => null
                ];
            }
        } else {
            $response = [
                'code' => 400,
                'status' => 'Username tidak ada',
                'data' => null
            ];
        }
        return json_encode($response);

    }

    public function register(Request $request){
        $register = User::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'jenis_pengguna' => $request->input('jenis_pengguna'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'status' => $request->input('status'),
            'kota_asal' => $request->input('kota_asal'),
            'pendidikan_terakhir' => $request->input('pendidikan_terakhir'),
            'no_hp' => $request->input('no_hp'),
            'profesi' => $request->input('profesi'),
            'institusi_tempat_kerja' => $request->input('institusi_tempat_kerja'),
        ]);

        if ($register) {
            $response = [
                'code' => 200,
                'status' => 'success'
            ];
        } else {
            $response = [
                'code' => 410,
                'status' => 'failed'
            ];
        }

        return json_encode($response);
    }
}
