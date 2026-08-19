<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoneyExchange extends Model
{
    protected $fillable = [
        "service_id",
        "tipe",
        "jumlah_input",
        "kurs",
        "hasil",
        "status",
        "tanggal_penyerahan",
        "supplier",
        "harga_dasar",
        "harga_jual"
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
