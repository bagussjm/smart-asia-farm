<?php

namespace App\Models;

use App\Casts\JsonUrls;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profil extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'profil';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama_instansi',
        'keterangan_instansi',
        'alamat_instansi',
        'lokasi_instansi',
        'foto_profil_instansi',
    ];

    protected $casts = [
        'lokasi_instansi' => JsonUrls::class
    ];
}
