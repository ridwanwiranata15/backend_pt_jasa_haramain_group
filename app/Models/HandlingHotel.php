<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class HandlingHotel extends Model
{
    protected $fillable = [
        "service_id",
        "nama",
        "tanggal",
        "harga",
        "pax",
        "status",
        "supplier",
        "harga_dasar",
        "harga_jual",
        "kode_booking",
        "rumlis",
        "identitas_koper"
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    protected function identitas_koper(){
        return Attribute::make(
            get: fn($identitas_koper) => url('/storage/handling_hotels' . $identitas_koper),
        );
    }
}
