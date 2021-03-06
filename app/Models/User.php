<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'email_verified_at',
        'password',
        'jenis_pengguna',
        'nama_lengkap',
        'no_hp',
        'alamat',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'remember_token',
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

    public function carts()
    {
        return $this->hasMany(Keranjang::class,'id_user','id');
    }

    public function cartsUnprocessed()
    {
        return $this->hasMany(Keranjang::class,'id_user','id')->unprocessed();
    }

    public function entranceTicket()
    {
        return $this->hasOne(TiketMasuk::class,'id_user','id')->withDefault([
            'id' => null,
            'id_tiket' => null,
            'nama_tiket_masuk' => '',
            'harga_tiket_masuk' => 0,
            'tipe_tiket' => '',
            'created_at' => null,
            'updated_at' => null,
            'deleted_at' => null,
        ]);
    }
}
