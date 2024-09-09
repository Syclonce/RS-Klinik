<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fmbiaya extends Model
{
    use HasFactory;
    protected $table = 'fmbiayas';
    protected $fillable = [
        'ktbiaya_id',
        'harga',
    ];

    public function ktbiaya()
    {
        return $this->belongsTo(ktbiaya::class);
    }
}
