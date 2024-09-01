<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akuntan extends Model
{
    use HasFactory;
    protected $table = 'akuntans';
    protected $fillable = [
        'nama',
        'Alamat',
        'telepon',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
