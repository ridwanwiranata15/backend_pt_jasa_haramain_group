<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuideOrder extends Model
{
    protected $fillable = [
        "service_id",
        "guide_id",
        "jumlah",
        "keterangan",
        "status",
        "muthowif_dari",
        "muthowif_sampai",
        "supplier",
        "harga_dasar",
        "harga_jual"
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }
    
}
