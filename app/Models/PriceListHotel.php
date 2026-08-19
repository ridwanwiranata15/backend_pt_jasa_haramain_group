<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceListHotel extends Model
{
    protected $fillable = [
        "tanggal",
        "nama_hotel",
        "tipe_kamar",
        "harga",
        "tanggal_checkout",
        "catatan",
        "add_on",
        "supplier_utama",
        "kontak_supplier_utama",
        "supplier_cadangan",
        "kontak_supplier_cadangan",
        "category"
    ];
}
