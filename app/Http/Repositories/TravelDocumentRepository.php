<?php 
namespace App\Http\Repositories;

use App\Http\Resources\TravelDocumentResource;
use App\Models\TravelDocument;

class TravelDocumentRepository{
    public function all()
    {
        $TravelDocuments = TravelDocument::when(
            request()->search, 
            function($TravelDocuments) {
                $TravelDocuments = $TravelDocuments->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $TravelDocuments->appends(['search' => request()->search]);
        return new TravelDocumentResource(true, 'List data TravelDocument', $TravelDocuments);    
    }

    public function create(array $data)
    {
        $TravelDocument =  TravelDocument::create($data);
        if($TravelDocument){
            return new TravelDocumentResource(true, 'TravelDocument berhasil di tambahkan', $TravelDocument);  
        }
        return new TravelDocumentResource(false, 'TravelDocument gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $TravelDocument = TravelDocument::findOrFail($id);
        $TravelDocument->update($data);
        if($TravelDocument){
            return new TravelDocumentResource(true, 'TravelDocument berhasil di ubah', $TravelDocument);  
        }
        return new TravelDocumentResource(false, 'TravelDocument gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $TravelDocument = TravelDocument::findOrFail($id);
        $TravelDocument->delete();
        if($TravelDocument){
            return new TravelDocumentResource(true, 'TravelDocument berhasil di hapus', $TravelDocument);  
        }
        return new TravelDocumentResource(false, 'TravelDocument gagal di hapus', []);  
    }
}