<?php 
namespace App\Http\Repositories;

use App\Http\Resources\ContentResource;
use App\Models\Content;

class ContentRepository{
    public function all()
    {
        $Contents = Content::when(
            request()->search, 
            function($Contents) {
                $Contents = $Contents->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $Contents->appends(['search' => request()->search]);
        return new ContentResource(true, 'List data Content', $Contents);    
    }

    public function create(array $data)
    {
        $Content =  Content::create($data);
        if($Content){
            return new ContentResource(true, 'Content berhasil di tambahkan', $Content);  
        }
        return new ContentResource(false, 'Content gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $Content = Content::findOrFail($id);
        $Content->update($data);
        if($Content){
            return new ContentResource(true, 'Content berhasil di ubah', $Content);  
        }
        return new ContentResource(false, 'Content gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $Content = Content::findOrFail($id);
        $Content->delete();
        if($Content){
            return new ContentResource(true, 'Content berhasil di hapus', $Content);  
        }
        return new ContentResource(false, 'Content gagal di hapus', []);  
    }
}