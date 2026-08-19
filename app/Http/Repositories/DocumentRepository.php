<?php 
namespace App\Http\Repositories;

use App\Http\Resources\DocumentResource;
use App\Models\Document;

class DocumentRepository{
    public function all()
    {
        $Documents = Document::when(
            request()->search, 
            function($Documents) {
                $Documents = $Documents->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $Documents->appends(['search' => request()->search]);
        return new DocumentResource(true, 'List data Document', $Documents);    
    }

    public function create(array $data)
    {
        $Document =  Document::create($data);
        if($Document){
            return new DocumentResource(true, 'Document berhasil di tambahkan', $Document);  
        }
        return new DocumentResource(false, 'Document gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $Document = Document::findOrFail($id);
        $Document->update($data);
        if($Document){
            return new DocumentResource(true, 'Document berhasil di ubah', $Document);  
        }
        return new DocumentResource(false, 'Document gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $Document = Document::findOrFail($id);
        $Document->delete();
        if($Document){
            return new DocumentResource(true, 'Document berhasil di hapus', $Document);  
        }
        return new DocumentResource(false, 'Document gagal di hapus', []);  
    }
}