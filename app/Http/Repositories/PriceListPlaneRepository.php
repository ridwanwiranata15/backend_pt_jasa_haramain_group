<?php 
namespace App\Http\Repositories;

use App\Http\Resources\PriceListPlaneResource;
use App\Models\PriceListPlane;

class PriceListPlaneRepository{
    public function all()
    {
        $PriceListPlanes = PriceListPlane::when(
            request()->search, 
            function($PriceListPlanes) {
                $PriceListPlanes = $PriceListPlanes->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $PriceListPlanes->appends(['search' => request()->search]);
        return new PriceListPlaneResource(true, 'List data PriceListPlane', $PriceListPlanes);    
    }

    public function create(array $data)
    {
        $PriceListPlane =  PriceListPlane::create($data);
        if($PriceListPlane){
            return new PriceListPlaneResource(true, 'PriceListPlane berhasil di tambahkan', $PriceListPlane);  
        }
        return new PriceListPlaneResource(false, 'PriceListPlane gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $PriceListPlane = PriceListPlane::findOrFail($id);
        $PriceListPlane->update($data);
        if($PriceListPlane){
            return new PriceListPlaneResource(true, 'PriceListPlane berhasil di ubah', $PriceListPlane);  
        }
        return new PriceListPlaneResource(false, 'PriceListPlane gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $PriceListPlane = PriceListPlane::findOrFail($id);
        $PriceListPlane->delete();
        if($PriceListPlane){
            return new PriceListPlaneResource(true, 'PriceListPlane berhasil di hapus', $PriceListPlane);  
        }
        return new PriceListPlaneResource(false, 'PriceListPlane gagal di hapus', []);  
    }
}