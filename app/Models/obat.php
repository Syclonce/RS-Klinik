<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    use HasFactory;
    protected $table = 'obats';
    protected $fillable = [
        'nama',
        'obatk_id',
        'pembelian',
        'penjualan',
        'kuantitas',
        'generik',
        'perusahaan',
        'efek',
        'kota',
        'tanggal',
    ];

    public function obatk()
    {
        return $this->belongsTo(obatk::class);
    }
}
