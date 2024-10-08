<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opname extends Model
{
    use HasFactory;
    protected $table = 'opnames';
    protected $fillable = [
        'kode',
        'nama',
        'harga_beli',
        'expired',
        'stok',
        'nama_bangsal',
    ];

    public function bangsal()
    {
        return $this->belongsTo(bangsal::class,'nama_bangsal','id');
    }
}
