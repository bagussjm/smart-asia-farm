<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
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
//        dd($request->all());
        DB::beginTransaction();
        try{
            Profil::updateOrCreate(
                ['id' => $profil],
                [
                    'nama_instansi' => $request->nama_instansi,
                    'keterangan_instansi' => $request->keterangan_instansi,
                    'alamat_instansi' => $request->alamat_instansi,
                    'lokasi_instansi' => $request->koordinat,
                    'foto_profil_instansi' => $request->foto_profil_instansi
                ]
            );
            DB::commit();

            return Redirect::route('profile.show',$profil)->with('success','Berhasil mengubah data profil');
        }catch (\Exception $exception){
            DB::rollBack();
            return Redirect::back()->with('error',$exception->getMessage());
        }
    }

    public function nullProfileBuilder($profile)
    {
        $profileData = Profil::find($profile);
        $data['profil'] = $profileData !== null ? $profileData : (object) array(
            'id' => $profile,
            'nama_instansi' => 'Belum ditambahkan',
            'keterangan_instansi' => 'Belum ditambahkan',
            'alamat_instansi' => null,
            'lokasi_instansi' => array(
                'latitude' => 000,
                'longitude' => 000
            ),
            'foto_profil_instansi' => '',
            'created_at' => null,
            'updated_at' => null,
            'deleted_at' => null,
        );
        return $data['profil'];
    }
}
