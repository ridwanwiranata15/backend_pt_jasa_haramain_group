<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class TravelDocument extends Model
{
    protected $fillable = [
        "service_id",
        "pas_foto",
        "paspor",
        "ktp",
        "visa"
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    protected function pas_foto(){
        return Attribute::make(
            get: fn($pas_foto) => url('/storage/travel_documents/pas_foto/' . $pas_foto),
        );
    }
    protected function paspor(){
        return Attribute::make(
            get: fn($paspor) => url('/storage/travel_documentspaspor/' . $paspor),
        );
    }
    protected function ktp(){
        return Attribute::make(
            get: fn($ktp) => url('/storage/travel_documents/ktp/' . $ktp),
        );
    }
    protected function visa(){
        return Attribute::make(
            get: fn($visa) => url('/storage/travel_documents/visa/' . $visa),
        );
    }
}
