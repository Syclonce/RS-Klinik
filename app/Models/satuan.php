<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class satuan extends Model
{
    use HasFactory;
    protected $table = 'satuans';
    protected $fillable = [
        'kode_satuan',
        'nama_satuan',
    ];

    public function satbes()
    {
        return $this->hasOne(dabar::class,'satbes_id','id');
    }

    public function sat()
    {
        return $this->hasOne(dabar::class,'sat_id','id');
    }
}
