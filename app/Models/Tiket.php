<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function Symfony\Component\Translation\t;

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
        'instruksi_pembayaran',
        'is_scanned'
    ];

    protected $casts = [
        'is_scanned' => 'boolean'
    ];

    public function getFormattedTotalBayarAttribute()
    {
        return 'Rp '.number_format($this->total_bayar,0,'','.');
    }

    public function carts()
    {
        return $this->hasMany(Keranjang::class,'id_tiket','id');
    }

    public function scopeBetween($q,$from,$to)
    {
        return $q->whereBetween('tanggal_masuk',[$from,$to]);
    }

    public function scopeSettlement($q)
    {
        return $q->where('status','success');
    }

    public function entranceTicket()
    {
        return $this->hasOne(TiketMasuk::class,'id_tiket','id')->withDefault([
                'id' => null,
                'id_tiket' => null,
                'id_user' => null,
                'nama_tiket_masuk' => '',
                'harga_tiket_masuk' => 0,
                'tipe_tiket' => '',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
        ]);
    }
}
