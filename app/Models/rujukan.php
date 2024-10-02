<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rujukan extends Model
{
    use HasFactory;
    protected $table = 'rujukans';
    protected $fillable = [
        'kategori',
        'nama_rujukan',
        'alamat',
        'telepon',
        'fax',
        'cp',
        'email',
        'kode_task',
    ];
}
