<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class wakafmodel extends Model
{
    protected $table = "wakafs";
    protected $fillable = [
        "name",
        "price",
        "supplier",
        "harga_dasar"
    ];

        public function WakafOrders(){
        return $this->hasMany(WakafOrder::class);
    }


}
