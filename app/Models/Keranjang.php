<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keranjang extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'keranjang';

    protected $fillable = [
        'id_user',
        'id_wahana',
        'id_tiket',
        'status_keranjang',
    ];

    public function scopeUnprocessed($query)
    {
        return $query->where('status_keranjang','belum diproses');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user','id')->withDefault([
            'id' => null,
            'email' => 'tidak dapat menemukan email',
            'nama_lengkap' => 'Tidak ditemukan data pengguna',
            'no_hp' => '',
            'alamat' => '',
            'jenis_kelamin' => '',
            'tanggal_lahir' => '',
            'tempat_lahir' => '',
        ]);
    }

    public function playground()
    {
        return $this->belongsTo(Wahana::class,'id_wahana','id')->withDefault([
            'id' => null,
            'nama_wahana' => 'Wahana tidak ditemukan',
            'deskripsi_wahana' => '',
            'profil_wahana' => '',
            'gambar_wahana' => [
                url('/images/asia-farm.png')
            ],
        ]);
    }

    public function ticket()
    {
        return $this->belongsTo(Tiket::class,'id_tiket','id')->withDefault([
            'id' => null,
            'tanggal_masuk' => '',
            'jam_masuk' => '',
            'status' => '',
            'total_bayar' => '',
            'kode_qr' => '',
        ]);
    }
}
