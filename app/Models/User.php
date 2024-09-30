<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasPermissions, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'profile',
        'phone',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function pasien()
    {
        return $this->hasOne(pasien::class);
    }

    public function sumberdaya()
    {
        return $this->hasOne(suberdaya::class);
    }

    public function apotek()
    {
        return $this->hasOne(apotek::class);
    }
    public function labotorium()
    {
        return $this->hasOne(laboratorium::class);
    }

    public function akuntan()
    {
        return $this->hasOne(akuntan::class);
    }
    public function resepsioni()
    {
        return $this->hasOne(resepsionis::class);
    }
}
