<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class industri extends Model
{
    use HasFactory;
    protected $table = 'industris';
    protected $fillable = [
        'kode_industri',
        'nama_industri',
        'Alamat',
        'kota',
        'telepon',
    ];

    public function dabar()
    {
        return $this->hasOne(dabar::class);
    }

}
