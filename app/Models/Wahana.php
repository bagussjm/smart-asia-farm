<?php

namespace App\Models;

use App\Casts\JsonUrls;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wahana extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'wahana';

    protected $fillable = [
        'nama_wahana',
        'deskripsi_wahana',
        'profil_wahana',
        'gambar_wahana',
        'tarif_tiket',
        'masa_aktif',
        'syarat_ketentuan',
    ];

    protected $casts = [
        'gambar_wahana' => JsonUrls::class
    ];

    public function carts()
    {
        return $this->hasMany(Keranjang::class,'id_wahanan','id');
    }
}
