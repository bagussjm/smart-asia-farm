<?php

namespace App\Http\Controllers;

use App\Models\Wahana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WahanaController extends Controller
{
    //
    public function index()
    {
        return view('backend.wahana.index');
    }

    public function create()
    {
        return view('backend.wahana.create');
    }

    public function store(Request $request)
    {
        $insert = Wahana::create([
            'nama_wahana' => $request->nama_wahana,
            'deskripsi_wahana' => $request->deskripsi_wahana,
            'profil_wahana' => $request->profil_wahana,
            'gambar_wahana' => $request->gambar_wahana,
            'tarif_tiket' => $request->tarif_tiket,
            'masa_aktif' => $request->masa_aktif,
            'syarat_ketentuan' => $request->syarat_ketentuan,
        ]);

        if ($insert){
            return Redirect::route('playground.index')->with('success','Berhasil Menyimpan Data Wahana');
        }
        return Redirect::back()->with('error','Ada Masalah Saat Menyimpan Data Wahana');
    }
}
