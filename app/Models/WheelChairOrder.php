<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WheelChairOrder extends Model
{
    protected $fillable = [
        "service_id",
        "wheel_chair_id",
        "jumlah",
        "status",
        "tanggal_pelaksanaan",
        "supplier",
        "harga_dasar",
        "harga_jual"
    ];

        public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function wheelChair()
    {
        return $this->belongsTo(WheelChair::class);
    }


}
