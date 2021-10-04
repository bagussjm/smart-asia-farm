<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show($profil)
    {
        $data['profil'] = $this->nullProfileBuilder($profil);
//        dd($data['profil']);

        return view('backend.profil.view',$data);
    }

    public function edit($profil)
    {

        $data['profil'] = $this->nullProfileBuilder($profil);
//        dd($data['profil']);
        return view('backend.profil.edit',$data);
    }

    public function update(Request $request,$profil)
    {
        dd($request->all());
    }

    public function nullProfileBuilder($profile)
    {
        $profileData = Profil::find($profile);
        $data['profil'] = $profileData !== null ? $profileData : (object) array(
            'id' => $profile,
            'nama_instansi' => 'Belum ditambahkan',
            'keterangan_instansi' => 'Belum ditambahkan',
            'alamat_instansi' => null,
            'lokasi_instansi' => null,
            'foto_profil_instansi' => '',
            'created_at' => null,
            'updated_at' => null,
            'deleted_at' => null,
        );
        return $data['profil'];
    }
}
