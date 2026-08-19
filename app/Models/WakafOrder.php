<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WakafOrder extends Model
{
    protected $fillable = [
        "service_id",
        "wakaf_id",
        "supplier",
        "harga_dasar",
        "harga_jual"
    ];

        public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function wakaf()
    {
        return $this->belongsTo(wakafmodel::class);
    }
}
