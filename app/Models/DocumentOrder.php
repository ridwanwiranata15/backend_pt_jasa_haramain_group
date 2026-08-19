<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentOrder extends Model
{
    protected $fillable = [
        "service_id",
        "document_detail_id",
        "document_id",
        "jumlah",
        "harga",
        "status",
        "supplier",
        "harga_dasar",
        "harga_jual"
    ];

     public function service()
    {
        return $this->belongsTo(Service::class);
    }
     public function documentDetail()
    {
        return $this->belongsTo(DocumentDetail::class);
    }
     public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
