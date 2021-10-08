<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->lokasi_instansi !== null){
            $coordinates = array(
                'latitude' => floatval($this->lokasi_instansi['latitude']),
                'longitude' => floatval($this->lokasi_instansi['longitude']),
            );
        }else{
            $coordinates = array(
                'latitude' => floatval(''),
                'longitude' => floatval(''),
            );
        }

        return [
            'id' => $this->id,
            'nama_instansi' => $this->nama_instansi,
            'keterangan_instansi' => $this->keterangan_instansi,
            'alamat_instansi' => $this->alamat_instansi,
            'lokasi_instansi' => $coordinates,
            'foto_profil_instansi' => $this->foto_profil_instansi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at
        ];
    }
}
