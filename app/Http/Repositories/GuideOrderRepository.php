<?php 
namespace App\Http\Repositories;

use App\Http\Resources\GuideOrderResource;
use App\Models\GuideOrder;

class GuideOrderRepository{
    public function all()
    {
        $GuideOrders = GuideOrder::when(
            request()->search, 
            function($GuideOrders) {
                $GuideOrders = $GuideOrders->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $GuideOrders->appends(['search' => request()->search]);
        return new GuideOrderResource(true, 'List data GuideOrder', $GuideOrders);    
    }

    public function create(array $data)
    {
        $GuideOrder =  GuideOrder::create($data);
        if($GuideOrder){
            return new GuideOrderResource(true, 'GuideOrder berhasil di tambahkan', $GuideOrder);  
        }
        return new GuideOrderResource(false, 'GuideOrder gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $GuideOrder = GuideOrder::findOrFail($id);
        $GuideOrder->update($data);
        if($GuideOrder){
            return new GuideOrderResource(true, 'GuideOrder berhasil di ubah', $GuideOrder);  
        }
        return new GuideOrderResource(false, 'GuideOrder gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $GuideOrder = GuideOrder::findOrFail($id);
        $GuideOrder->delete();
        if($GuideOrder){
            return new GuideOrderResource(true, 'GuideOrder berhasil di hapus', $GuideOrder);  
        }
        return new GuideOrderResource(false, 'GuideOrder gagal di hapus', []);  
    }
}