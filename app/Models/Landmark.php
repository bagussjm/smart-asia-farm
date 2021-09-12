<?php

namespace App\Models;

use App\Casts\JsonUrls;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Landmark extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'landmark';

    protected $fillable = [
        'nama_landmark',
        'deskripsi_landmark',
        'info_landmark',
        'profil_landmark',
        'gambar_landmark',
    ];

    protected $casts = [
        'gambar_landmark' => JsonUrls::class
    ];
}
