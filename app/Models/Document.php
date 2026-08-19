<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        "name",
    ];

    public function details()
    {
        return $this->hasMany(DocumentDetail::class);
    }
     public function orderDocuments()
    {
        return $this->hasMany(DocumentOrder::class);
    }
}
