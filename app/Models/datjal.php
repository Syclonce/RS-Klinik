<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datjal extends Model
{
    use HasFactory;
    protected $table = 'datjals';
    protected $fillable = [
        'nama_barang',
        'harga',
        'stok',
        'ket',
    ];

}
