<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        "foto",
        "nama_travel",
        "alamat",
        "email",
        "penanggung_jawab",
        "phone",
        "no_ktp",
        "status"
    ];

    public function services()
    {
        return $this->belongsTo(Service::class);
    }
    protected function foto(){
        return Attribute::make(
            get: fn($foto) => url('/storage/customers' . $foto),
        );
    }
}
