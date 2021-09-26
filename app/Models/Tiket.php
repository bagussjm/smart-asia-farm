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

    public function carts()
    {
        return $this->hasMany(Keranjang::class,'id_tiket','id');
    }
}
