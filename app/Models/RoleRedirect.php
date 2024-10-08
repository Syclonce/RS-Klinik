<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleRedirect extends Model
{
    use HasFactory;
    protected $table = 'role_redirects';
    protected $fillable = [
        'role_id',
        'redirect_route',
    ];
}
