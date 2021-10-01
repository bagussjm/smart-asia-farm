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
        'nama_tiket_masuk',
        'harga_tiket_masuk'
    ];

    public function getFormattedHargaTiketMasukAttribute()
    {
        return 'Rp '.number_format($this->harga_tiket_masuk,0,'','.');
    }

}
