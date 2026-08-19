<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodOrder extends Model
{
    protected $fillable = [
        "service_id",
        "food_id",
        "jumlah",
        "dari_tanggal",
        "sampai_tanggal",
        "status",
        "supplier",
        "status",
        "supplier",
        "harga_dasar",
        "harga_jual"
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function food()
    {
        return $this->belongsTo(Food::class);
    }


}
