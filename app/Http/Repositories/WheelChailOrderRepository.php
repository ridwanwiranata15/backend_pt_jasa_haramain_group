<?php 
namespace App\Http\Repositories;

use App\Http\Resources\WheelChairOrderResource;
use App\Models\WheelChairOrder;

class WheelChairOrderRepository{
    public function all()
    {
        $WheelChairOrders = WheelChairOrder::when(
            request()->search, 
            function($WheelChairOrders) {
                $WheelChairOrders = $WheelChairOrders->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $WheelChairOrders->appends(['search' => request()->search]);
        return new WheelChairOrderResource(true, 'List data WheelChairOrder', $WheelChairOrders);    
    }

    public function create(array $data)
    {
        $WheelChairOrder =  WheelChairOrder::create($data);
        if($WheelChairOrder){
            return new WheelChairOrderResource(true, 'WheelChairOrder berhasil di tambahkan', $WheelChairOrder);  
        }
        return new WheelChairOrderResource(false, 'WheelChairOrder gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $WheelChairOrder = WheelChairOrder::findOrFail($id);
        $WheelChairOrder->update($data);
        if($WheelChairOrder){
            return new WheelChairOrderResource(true, 'WheelChairOrder berhasil di ubah', $WheelChairOrder);  
        }
        return new WheelChairOrderResource(false, 'WheelChairOrder gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $WheelChairOrder = WheelChairOrder::findOrFail($id);
        $WheelChairOrder->delete();
        if($WheelChairOrder){
            return new WheelChairOrderResource(true, 'WheelChairOrder berhasil di hapus', $WheelChairOrder);  
        }
        return new WheelChairOrderResource(false, 'WheelChairOrder gagal di hapus', []);  
    }
}