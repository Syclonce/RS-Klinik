<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'kabupaten';

    protected $fillable = [
        'kode',
        'name',
        'kode_provinsi',
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'kode_provinsi', 'kode_provinsi');
    }

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'kode_kabupaten', 'kode_kabupaten');
    }

}
