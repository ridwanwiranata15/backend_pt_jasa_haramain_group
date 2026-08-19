<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class HandlingPlane extends Model
{
    protected $fillable = [
        "service_id",
        "nama_bandara",
        "jumlah_jamaah",
        "harga",
        "kedatangan_jamaah",
        "status",
        "supplier",
        "harga_dasar",
        "harga_jual",
        "paket_info",
        "nama_supir",
        "identitas_koper"
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    protected function identitas_koper(){
        return Attribute::make(
            get: fn($identitas_koper) => url('/storage/handling_planes' . $identitas_koper),
        );
    }
}
