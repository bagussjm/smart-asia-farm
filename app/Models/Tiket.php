<?php

namespace App\Models;

use Carbon\Carbon;
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

    protected $appends = [
        'ticket_scan_status'
    ];

    public function getFormattedTotalBayarAttribute()
    {
        return 'Rp '.number_format($this->total_bayar,0,'','.');
    }

    public function getTicketScanStatusAttribute()
    {
        $bookTimestamp = Carbon::make($this->tanggal_masuk)->timestamp;
        $nowTimestamp = Carbon::now()->timestamp;

        if (!$this->is_scanned){
            if ($nowTimestamp > $bookTimestamp){
                return 'kadaluarsa';
            }else{
                return 'menunggu';
            }
        }else{
            return 'terkonfirmasi';
        }
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

    public function scopeScanned($q)
    {
        return $q->where('is_scanned',1);
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
