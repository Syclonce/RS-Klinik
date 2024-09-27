<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenbar extends Model
{
    use HasFactory;
    protected $table = 'jenbars';
    protected $fillable = [
        'kode_jenbar',
        'nama_jenbar',
        'deskripsi',
    ];

    public function dabar()
    {
        return $this->hasOne(dabar::class);
    }

}
