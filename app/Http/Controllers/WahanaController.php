<?php

namespace App\Http\Controllers;

use App\Models\Wahana;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WahanaController extends Controller
{
    //
    public function index()
    {
        $data['wahana'] = Wahana::orderBy('created_at','desc')->get();
        return view('backend.wahana.index',$data);
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

    public function show(Wahana $wahana)
    {
        $data['wahana'] = $wahana;

        return view('backend.wahana.view',$data);
    }

    public function edit(Wahana $wahana)
    {
        $data['wahana'] = $wahana;

        return view('backend.wahana.edit',$data);
    }

    public function update(Request $request, Wahana $wahana)
    {
        $update = $wahana->update([
            'nama_wahana' => $request->nama_wahana,
            'deskripsi_wahana' => $request->deskripsi_wahana,
            'profil_wahana' => $request->profil_wahana,
            'gambar_wahana' => $request->gambar_wahana,
            'tarif_tiket' => $request->tarif_tiket,
            'masa_aktif' => $request->masa_aktif,
            'syarat_ketentuan' => $request->syarat_ketentuan,
        ]);

        if ($update){
            return Redirect::route('playground.index')->with('success','Berhasil Mengubah Data Wahana');
        }
        return Redirect::back()->with('error','Ada Masalah Saat Mengubah Data Wahana');
    }

    public function delete(Wahana $wahana)
    {
        $delete = $wahana->delete();

        if ($delete){
            return Redirect::back()->with('success','Berhasil Menghapus Data Wahana');
        }
        return Redirect::back()->with('error','Ada Masalah Saat Menghapus Data Wahana');
    }
}
