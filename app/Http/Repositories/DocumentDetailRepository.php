<?php 
namespace App\Http\Repositories;

use App\Http\Resources\DocumentDetailResource;
use App\Models\DocumentDetail;

class DocumentDetailRepository{
    public function all()
    {
        $DocumentDetails = DocumentDetail::when(
            request()->search, 
            function($DocumentDetails) {
                $DocumentDetails = $DocumentDetails->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $DocumentDetails->appends(['search' => request()->search]);
        return new DocumentDetailResource(true, 'List data DocumentDetail', $DocumentDetails);    
    }

    public function create(array $data)
    {
        $DocumentDetail =  DocumentDetail::create($data);
        if($DocumentDetail){
            return new DocumentDetailResource(true, 'DocumentDetail berhasil di tambahkan', $DocumentDetail);  
        }
        return new DocumentDetailResource(false, 'DocumentDetail gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $DocumentDetail = DocumentDetail::findOrFail($id);
        $DocumentDetail->update($data);
        if($DocumentDetail){
            return new DocumentDetailResource(true, 'DocumentDetail berhasil di ubah', $DocumentDetail);  
        }
        return new DocumentDetailResource(false, 'DocumentDetail gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $DocumentDetail = DocumentDetail::findOrFail($id);
        $DocumentDetail->delete();
        if($DocumentDetail){
            return new DocumentDetailResource(true, 'DocumentDetail berhasil di hapus', $DocumentDetail);  
        }
        return new DocumentDetailResource(false, 'DocumentDetail gagal di hapus', []);  
    }
}