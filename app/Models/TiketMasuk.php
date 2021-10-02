<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TiketMasuk extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'tiket_masuk';

    protected $fillable = [
        'id_tiket',
        'nama_tiket_masuk',
        'harga_tiket_masuk'
    ];

    public function getFormattedHargaTiketMasukAttribute()
    {
        return 'Rp '.number_format($this->harga_tiket_masuk,0,'','.');
    }

    public function ticket()
    {
        return $this->belongsTo(Tiket::class,'id_tiket','id')->withDefault([
            'id' => null,
            'tanggal_masuk' => '',
            'jam_masuk' => '',
            'status' => '',
            'total_bayar' => 0,
            'kode_qr' => '',
            'instruksi_pembayaran' => '',
            'created_at' => null,
            'updated_at' => null,
            'deleted_at' => null,
        ]);
    }

}
