<?php 
namespace App\Http\Repositories;

use App\Http\Resources\ContentOrderResource;
use App\Models\ContentOrder;

class ContentOrderRepository{
    public function all()
    {
        $ContentOrders = ContentOrder::when(
            request()->search, 
            function($ContentOrders) {
                $ContentOrders = $ContentOrders->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $ContentOrders->appends(['search' => request()->search]);
        return new ContentOrderResource(true, 'List data ContentOrder', $ContentOrders);    
    }

    public function create(array $data)
    {
        $ContentOrder =  ContentOrder::create($data);
        if($ContentOrder){
            return new ContentOrderResource(true, 'ContentOrder berhasil di tambahkan', $ContentOrder);  
        }
        return new ContentOrderResource(false, 'ContentOrder gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $ContentOrder = ContentOrder::findOrFail($id);
        $ContentOrder->update($data);
        if($ContentOrder){
            return new ContentOrderResource(true, 'ContentOrder berhasil di ubah', $ContentOrder);  
        }
        return new ContentOrderResource(false, 'ContentOrder gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $ContentOrder = ContentOrder::findOrFail($id);
        $ContentOrder->delete();
        if($ContentOrder){
            return new ContentOrderResource(true, 'ContentOrder berhasil di hapus', $ContentOrder);  
        }
        return new ContentOrderResource(false, 'ContentOrder gagal di hapus', []);  
    }
}