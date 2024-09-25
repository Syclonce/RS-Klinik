<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setsatusehat extends Model
{
    use HasFactory;
    protected $table = 'setsatusehats';
    protected $fillable = [
        'org_id',
        'client_id',
        'client_secret',
        'SATUSEHAT_BASE_URL',
    ];
}
