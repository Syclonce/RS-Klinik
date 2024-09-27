<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setbpjs extends Model
{
    use HasFactory;
    protected $table = 'setbpjs';
    protected $fillable = [
        'BPJS_PCARE_CONSID',
        'BPJS_PCARE_SCREET_KEY',
        'BPJS_PCARE_USERNAME',
        'BPJS_PCARE_PASSWORD',
        'BPJS_PCARE_APP_CODE',
        'BPJS_PCARE_USER_KEY',
        'BPJS_PCARE_BASE_URL',
        'BPJS_PCARE_SERVICE_NAME',
    ];
}
