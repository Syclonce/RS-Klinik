<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    use HasFactory;
    protected $table = 'kamars';
    protected $fillable = [
        'nama_kamar',
        'nomor_bed',
        'kelas',
        'harga',
        'status',
    ];

    public function bangsal()
    {
        return $this->belongsTo(bangsal::class,'nama_kamar','kode_bangsal');
    }

    public function kelaskamar()
    {
        return $this->belongsTo(kelaskamar::class,'kelas','id');
    }
}
