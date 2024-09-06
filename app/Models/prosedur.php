<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prosedur extends Model
{
    use HasFactory;
    protected $table = 'prosedurs';
    protected $fillable = [
        'kode',
        'pembayaran',
        'deskripsi',
        'harga',
        'komisi',
        'tipepemeriksas_id',
    ];

    public function tipepemeriksa()
    {
        return $this->belongsTo(tipepemeriksa::class ,'id');
    }
}
