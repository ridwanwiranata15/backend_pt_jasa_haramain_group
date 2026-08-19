<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WheelChair extends Model
{
    protected $fillable = [
        "name",
        "price",
        "supplier",
        "harga_dasar"
    ];
    public function wheelChairOrder()
    {
        return $this->HasMany(WheelChairOrder::class);
    }
}
