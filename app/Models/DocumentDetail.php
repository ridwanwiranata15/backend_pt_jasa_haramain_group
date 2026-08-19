<?php

namespace App\Models;

use App\Models\Document as ModelsDocument;
use Dom\Document;
use Illuminate\Database\Eloquent\Model;

class DocumentDetail extends Model
{
    
    protected $fillable = [
        "document_id",
        "name",
        "price",
        "supplier",
        "harga_dasar"
    ];

    public function document()
    {
        return $this->belongsTo(ModelsDocument::class);
    }
     public function orderDocuments()
    {
        return $this->hasMany(DocumentOrder::class);
    }
}
