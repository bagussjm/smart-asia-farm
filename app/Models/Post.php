<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'post';

    protected $fillable = [
        'judul_post',
        'isi_post',
        'thumbnail_post',
        'foto_post',
    ];

    public function getFormattedPostDateAttribute()
    {
        return Carbon::parse($this->created_at)->translatedFormat('d F Y H:i').' WIB';
    }

    public function getFormattedPostUpdateAttribute()
    {
        return Carbon::parse($this->updated_at)->translatedFormat('d F Y H:i').' WIB';
    }
}
