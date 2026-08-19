<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceListPlane extends Model
{
    protected $fillable = [
        "tanggal",
        "jam_berangkat",
        "kelas",
        "harga"
    ];
}
