<?php

namespace App\Http\Controllers;

use App\Models\Landmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LandMarkController extends Controller
{
    public function index()
    {
        $data['landmark'] = Landmark::orderBy('created_at','desc')->get();

        return view('backend.landmark.index',$data);
    }

    public function create()
    {
        return view('backend.landmark.create');
    }

    public function store(Request $request)
    {
        $insert = Landmark::create([
            'nama_landmark' => $request->nama_landmark,
            'deskripsi_landmark' => $request->deskripsi_landmark,
            'info_landmark' => $request->info_landmark,
            'profil_landmark' => $request->profil_landmark,
            'gambar_landmark' => $request->gambar_landmark,
        ]);

        if ($insert){
            return Redirect::route('landmark.index')->with('success','Berhasil menambah data landmark');
        }
        return Redirect::back()->with('error','Ada masalah saat menambah data landmark');
    }

    public function show(Landmark $landmark)
    {
        $data['landmark'] = $landmark;

        return view('backend.landmark.view',$data);
    }

    public function edit(Landmark $landmark)
    {
        $data['landmark'] = $landmark;
        return view('backend.landmark.edit',$data);
    }

    public function update(Request $request,Landmark $landmark)
    {
        $update = $landmark->update([
            'nama_landmark' => $request->nama_landmark,
            'deskripsi_landmark' => $request->deskripsi_landmark,
            'info_landmark' => $request->info_landmark,
            'profil_landmark' => $request->profil_landmark,
            'gambar_landmark' => $request->gambar_landmark,
        ]);

        if ($update){
            return Redirect::route('landmark.index')->with('success','Berhasil mengubah data landmark');
        }
        return Redirect::back()->with('error','Ada masalah saat mengubah data landmark');
    }

    public function delete(Landmark  $landmark)
    {
        $delete = $landmark->delete();

        if ($delete){
            return Redirect::back()->with('success','Berhasil menghapus data landmark');
        }
        return Redirect::back()->with('error','Ada masalah saat menghapus data landmark');
    }
}
