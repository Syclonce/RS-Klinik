<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'tgl',
        'jam',
        'nama_pembeli',
        'alamat_pembeli',
        'telepon',
        'email',
        'keterangan',
        'harga',
        'jumlah',
        'harga_total',
        'cara_bayar',
        'stok',
        'datjal_id',
    ];

    public function datjal()
    {
        return $this->belongsTo(datjal::class);
    }
}
