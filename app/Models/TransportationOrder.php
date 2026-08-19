<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportationOrder extends Model
{
    protected $fillable = [
        "service_id",
        "transportation_id",
        "tour_id",
        "tanggal_keberangkatan",
        "supplier",
        "harga_dasar",
        "harga_jual",
        "status"
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function transportation()
    {
        return $this->belongsTo(Transportation::class);
    }
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
