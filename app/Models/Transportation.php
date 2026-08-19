<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    protected $fillable = [
        "nama",
        "kapasitas",
        "fasilitas",
        "harga"
    ];
    public function routes()
    {
        return $this->hasMany(Route::class);
    }
    public function TransportationOrders()
    {
        return $this->hasMany(TransportationOrder::class);
    }
}
