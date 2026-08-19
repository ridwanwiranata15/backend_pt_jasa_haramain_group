<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        "service_id",
        "tanggal_checkin",
        "tanggal_checkout",
        "nama_hotel",
        "harga_perkamar",
        "jumlah_kamar",
        "catatan",
        "type",
        "jumlah_type",
        "status",
        "supplier",
        "harga_dasar",
        "harga_jual"
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
