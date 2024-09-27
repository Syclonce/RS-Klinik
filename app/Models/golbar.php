<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class golbar extends Model
{
    use HasFactory;
    protected $table = 'golbars';
    protected $fillable = [
        'kode_golbar',
        'nama_golbar',
    ];

    public function dabar()
    {
        return $this->hasOne(dabar::class);
    }

}
