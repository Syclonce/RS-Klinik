<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = 'provinsi'; 

    protected $fillable = [
        'kode',
        'name',
    ];

    public function kabupaten()
    {
        return $this->hasMany(Kabupaten::class, 'kode_provinsi', 'kode_provinsi');
    }

}
