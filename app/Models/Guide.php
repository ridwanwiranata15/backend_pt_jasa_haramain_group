<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $fillable = [
        "nama",
        "harga",
        "keterangan"
    ];
        public function GuideOrders()
    {
        return $this->hasMany(GuideOrder::class);
    }
}
