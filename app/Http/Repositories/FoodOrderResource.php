<?php 
namespace App\Http\Repositories;

use App\Http\Resources\FoodOrderResource;
use App\Models\FoodOrder;

class FoodOrderRepository{
    public function all()
    {
        $FoodOrders = FoodOrder::when(
            request()->search, 
            function($FoodOrders) {
                $FoodOrders = $FoodOrders->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $FoodOrders->appends(['search' => request()->search]);
        return new FoodOrderResource(true, 'List data FoodOrder', $FoodOrders);    
    }

    public function create(array $data)
    {
        $FoodOrder =  FoodOrder::create($data);
        if($FoodOrder){
            return new FoodOrderResource(true, 'FoodOrder berhasil di tambahkan', $FoodOrder);  
        }
        return new FoodOrderResource(false, 'FoodOrder gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $FoodOrder = FoodOrder::findOrFail($id);
        $FoodOrder->update($data);
        if($FoodOrder){
            return new FoodOrderResource(true, 'FoodOrder berhasil di ubah', $FoodOrder);  
        }
        return new FoodOrderResource(false, 'FoodOrder gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $FoodOrder = FoodOrder::findOrFail($id);
        $FoodOrder->delete();
        if($FoodOrder){
            return new FoodOrderResource(true, 'FoodOrder berhasil di hapus', $FoodOrder);  
        }
        return new FoodOrderResource(false, 'FoodOrder gagal di hapus', []);  
    }
}