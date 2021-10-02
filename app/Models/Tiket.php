<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tiket extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'tiket';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'tanggal_masuk',
        'jam_masuk',
        'status',
        'total_bayar',
        'kode_qr',
        'instruksi_pembayaran'
    ];

    public function getFormattedTotalBayarAttribute()
    {
        return 'Rp '.number_format($this->total_bayar,0,'','.');
    }

    public function carts()
    {
        return $this->hasMany(Keranjang::class,'id_tiket','id');
    }
}
