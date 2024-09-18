<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan'; 

    protected $fillable = [
        'kode',
        'name',
        'kode_kabupaten',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kode_kabupaten', 'kode_kabupaten');
    }

    public function desa()
    {
        return $this->hasMany(Desa::class, 'kode_kecamatan', 'kode_kecamatan');
    }

}
