<?php 
namespace App\Http\Repositories;

use App\Http\Resources\HandlingPlaneResource;
use App\Models\HandlingPlane;

class HandlingPlaneRepository{
    public function all()
    {
        $HandlingPlanes = HandlingPlane::when(
            request()->search, 
            function($HandlingPlanes) {
                $HandlingPlanes = $HandlingPlanes->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $HandlingPlanes->appends(['search' => request()->search]);
        return new HandlingPlaneResource(true, 'List data HandlingPlane', $HandlingPlanes);    
    }

    public function create(array $data)
    {
        $HandlingPlane =  HandlingPlane::create($data);
        if($HandlingPlane){
            return new HandlingPlaneResource(true, 'HandlingPlane berhasil di tambahkan', $HandlingPlane);  
        }
        return new HandlingPlaneResource(false, 'HandlingPlane gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $HandlingPlane = HandlingPlane::findOrFail($id);
        $HandlingPlane->update($data);
        if($HandlingPlane){
            return new HandlingPlaneResource(true, 'HandlingPlane berhasil di ubah', $HandlingPlane);  
        }
        return new HandlingPlaneResource(false, 'HandlingPlane gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $HandlingPlane = HandlingPlane::findOrFail($id);
        $HandlingPlane->delete();
        if($HandlingPlane){
            return new HandlingPlaneResource(true, 'HandlingPlane berhasil di hapus', $HandlingPlane);  
        }
        return new HandlingPlaneResource(false, 'HandlingPlane gagal di hapus', []);  
    }
}