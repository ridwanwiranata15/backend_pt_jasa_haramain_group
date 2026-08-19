<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        "name",
        "supplier",
        "harga_dasar"
    ];
    public function TransportationOrders()
    {
        return $this->hasMany(TransportationOrder::class);
    }
}
