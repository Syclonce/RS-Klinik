<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class goldar extends Model
{
    use HasFactory;
    protected $table = 'goldars';
    protected $fillable = [
        'nama',
    ];

    public function pasien()
    {
        return $this->hasOne(pasien::class);
    }

    public function datapendor()
    {
        return $this->hasOne(datapendor::class);
    }

    public function stokda()
    {
        return $this->hasOne(stokda::class);
    }
}
