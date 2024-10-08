<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komda extends Model
{
    use HasFactory;
    protected $table = 'komdas';
    protected $fillable = [
        'kode',
        'nama',
        'lama',
        'jasa',
        'bhp',
        'kso',
        'manajemen',
        'total',
        'batal',
    ];

    public function datadonor()
    {
        return $this->hasOne(datadonor::class, 'id', 'nama');
    }

    public function stokda()
    {
        return $this->hasOne(stokda::class, 'id', 'kode');
    }
}
