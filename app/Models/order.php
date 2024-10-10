<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
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
        'potongan',
        'harga_total',
        'bayar',
        'kembalian',
        'cara_bayar',
    ];

    public function order_detail()
    {
        return $this->hasOne(order_detail::class,'id','order_id');
    }
}
