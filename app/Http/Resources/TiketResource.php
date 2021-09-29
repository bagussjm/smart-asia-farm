<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TiketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tanggal_masuk' => $this->tanggal_masuk,
            'jam_masuk' => $this->jam_masuk,
            'status' => $this->status,
            'total_bayar' => $this->total_bayar,
            'kode_qr' => $this->kode_qr,
            'instruksi_pembayaran' => $this->instruksi_pembayaran,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at
        ];
    }
}
