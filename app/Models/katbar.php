<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class katbar extends Model
{
    use HasFactory;
    protected $table = 'katbars';
    protected $fillable = [
        'kode_barang',
        'nama_barang',
    ];

    public function dabar()
    {
        return $this->hasOne(dabar::class);
    }

}
