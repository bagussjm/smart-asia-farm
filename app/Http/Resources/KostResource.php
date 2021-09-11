<?php

namespace App\Http\Resources;

use App\Models\Kamar;
use Illuminate\Http\Resources\Json\JsonResource;

class KostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $rooms = $this->kamar;
        $roomCosts = count($rooms) > 0 ? Kamar::find($rooms[0]->id_kamar)
            ->biaya()->get() : [];

        return [
            'id_kost' => $this->id_kost,
            'koordinat_kost' => $this->koordinat_kost,
            'kelurahan_kost' => $this->kelurahan_kost,
            'kecamatan_kost' => $this->kecamatan_kost,
            'nama_kost' => $this->nama_kost,
            'alamat_kost' => $this->alamat_kost,
            'daerah_kost' => $this->daerah_kost,
            'tipe_kost' => $this->tipe_kost,
            'foto_bangunan_kost' => $this->foto_bangunan_kost,
            'foto_kamar_kost' => $this->foto_kamar_kost,
            'foto_kamar_mandi_kost' => $this->foto_kamar_mandi_kost,
            'foto_fasilitas_bersama_kost' => $this->foto_fasilitas_bersama_kost,
            'video_kost' => $this->video_kost,
            'video_360_kost' => $this->video_360_kost,
            'ketentuan_sewa_kost' => $this->ketentuan_sewa_kost,
            'info_tambahan_kost' => $this->info_tambahan_kost,
            'informasi_pembayaran_kost' => $this->informasi_pembayaran_kost,
            'pemilik' => $this->pemilik,
            'kamar' => $this->kamar,
            'harga_kamar' => $roomCosts,
            'fasilitas_kost' => $this->fasilitas
        ];
    }
}
