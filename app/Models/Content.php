<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        "name",
        "price"
    ];

    public function contentOrders(){
        return $this->hasMany(ContentOrder::class);
    }
}
