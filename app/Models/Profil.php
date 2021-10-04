<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profil extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'profil';

    protected $fillable = [
        'nama_instansi',
        'keterangan_instansi',
        'alamat_instansi',
        'lokasi_instansi',
        'foto_profil_instansi',
    ];
}
