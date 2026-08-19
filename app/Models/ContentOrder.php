<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentOrder extends Model
{
    protected $fillable = [
        "service_id",
        "content_id",
        "jumlah",
        "keterangan",
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
    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
