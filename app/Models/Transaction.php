<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        "order_id",
        "jumlah_bayar",
        "tanggal_bayar",
        "bukti_pembayaran",
        "status",
        "catatan"
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    protected function bukti_pembayaran(){
        return Attribute::make(
            get: fn($bukti_pembayaran) => url('/storage/trnasactions' . $bukti_pembayaran),
        );
    }
}
