<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SewaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id_sewa' => $this->id_sewa,
            'id_kamar' => $this->id_kamar,
            'id_penyewa' => $this->id_penyewa,
            'nama_penyewa' => $this->nama_penyewa,
            'jenis_kelamin_penyewa' => $this->jenis_kelamin_penyewa,
            'jumlah_penyewa' => $this->jumlah_penyewa,
            'jumlah_bayar' => $this->jumlah_bayar,
            'status_sewa' => $this->status_sewa,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->delete_at,
            'kost_kamar' => $this->kamar->kost
        ];
    }
}
