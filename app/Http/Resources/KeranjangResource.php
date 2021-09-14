<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KeranjangResource extends JsonResource
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
            'id_user' => $this->id_user,
            'id_wahana' => $this->id_wahana,
            'id_tiket' => $this->id_tiket,
            'status_keranjang' => $this->status_keranjang,
            'user' => $this->user,
            'wahana' => $this->playground,
            'tiket' => $this->ticket
        ];
    }
}
