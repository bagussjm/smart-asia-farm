<?php

namespace App\Models;

use App\Models\Pivots\NotifikasiPivot;
use App\Models\Pivots\SewaPivot;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kota_asal',
        'pendidikan_terakhir',
        'no_hp',
        'institusi_tempat_kerja',
        'status',
        'jenis_kelamin',
        'password',
        'tanggal_lahir',
        'email',
        'jenis_pengguna',
        'profesi',
        'nama_lengkap',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
     * scopes
     * */
    public function pemilik($query)
    {
        return $query->where('jenis_pengguna','pemilik');
    }

    public function pencari($query)
    {
        return $query->where('jenis_pengguna','pencari');
    }

    // on to many relationships
    public function kost()
    {
        return $this->hasMany(Kost::class,'id_pemilik','id');
    }

    public function kamarKost()
    {
        return $this->hasManyThrough(
            Kamar::class,
            Kost::class,
            'id_pemilik',
            'id_kost',
            'id',
            'id_kost'
        );
    }

    // many to many relationships
    public function kostFavorit()
    {
        return $this->belongsToMany(
            Kost::class,
            'favorit',
            'id_user',
            'id_kost',
            'id',
            'id_kost'
        )
            ->using(Favorit::class)
            ->withPivot('id_favorit','id_favorit')
            ->withPivot('deleted_at','deleted_at')
            ->wherePivot('deleted_at',null)
            ->withTimestamps();
    }

    public function sewa()
    {
        return $this->belongsToMany(
            Kamar::class,
            'sewa',
            'id_penyewa',
            'id_kamar',
            'id',
            'id_kamar'
        )
            ->using(SewaPivot::class)
            ->withPivot('id_sewa','id_sewa')
            ->withPivot('nama_penyewa','nama_penyewa')
            ->withPivot('jenis_kelamin_penyewa','jenis_kelamin_penyewa')
            ->withPivot('jumlah_penyewa','jumlah_penyewa')
            ->withPivot('deleted_at','deleted_at')
            ->wherePivot('deleted_at',null)
            ->withTimestamps();
    }

    public function kontrak()
    {
        return $this->hasMany(Kontrak::class,'id_penyewa','id');
    }

    public function notifikasi()
    {
        return $this->belongsToMany(
            Kamar::class,
            'notifikasi',
            'id_pemilik',
            'id_kamar',
            'id',
            'id_kamar'
        )
            ->using(NotifikasiPivot::class)
            ->withPivot('id_notifikasi','id_notifikasi')
            ->withPivot('pesan_notifikasi','pesan_notifikasi')
            ->withPivot('tipe_notifikasi','tipe_notifikasi')
            ->withPivot('dibaca','dibaca')
            ->withPivot('deleted_at','deleted_at')
            ->wherePivot('deleted_at',null)
            ->withTimestamps();
    }

}
