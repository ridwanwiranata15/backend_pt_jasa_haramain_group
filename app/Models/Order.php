<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected  $fillable = [
        "service_id",
        "invoice",
        "total_estimasi",
        "total_yang_dibayarkan",
        "sisa_hutang",
        "total_amount_final",
        "status_harga",
        "status_pembayaran",
        "upload_transfer",
        "bukti_pembayaran",
        "status_bukti_pembayaran"
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    protected function bukti_pembayaran(){
        return Attribute::make(
            get: fn($bukti_pembayaran) => url('/storage/orders' . $bukti_pembayaran),
        );
    }
    protected function upload_transfer(){
        return Attribute::make(
            get: fn($upload_transfer) => url('/storage/orders' . $upload_transfer),
        );
    }
}
