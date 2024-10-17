<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suberdaya extends Model
{
    use HasFactory;
    protected $table = 'suberdayas';
    protected $fillable = [
        'nama',
        'Alamat',
        'telepon',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function layanan()
    {
        return $this->hasOne(rajal_layanan::class,'id','id_perawat');
    }
}
