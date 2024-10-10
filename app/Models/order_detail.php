<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'harga',
        'stok',
        'datjal_id',
        'order_id',
    ];

    public function datjal()
    {
        return $this->belongsTo(datjal::class);
    }

    public function order()
    {
        return $this->hasOne(order::class,'order_id','id');
    }
}

