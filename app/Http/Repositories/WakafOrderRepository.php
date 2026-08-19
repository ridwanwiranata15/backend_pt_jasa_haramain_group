<?php 
namespace App\Http\Repositories;

use App\Http\Resources\WakafOrderResource;
use App\Models\WakafOrder;

class WakafOrderRepository{
    public function all()
    {
        $WakafOrders = WakafOrder::when(
            request()->search, 
            function($WakafOrders) {
                $WakafOrders = $WakafOrders->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $WakafOrders->appends(['search' => request()->search]);
        return new WakafOrderResource(true, 'List data WakafOrder', $WakafOrders);    
    }

    public function create(array $data)
    {
        $WakafOrder =  WakafOrder::create($data);
        if($WakafOrder){
            return new WakafOrderResource(true, 'WakafOrder berhasil di tambahkan', $WakafOrder);  
        }
        return new WakafOrderResource(false, 'WakafOrder gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $WakafOrder = WakafOrder::findOrFail($id);
        $WakafOrder->update($data);
        if($WakafOrder){
            return new WakafOrderResource(true, 'WakafOrder berhasil di ubah', $WakafOrder);  
        }
        return new WakafOrderResource(false, 'WakafOrder gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $WakafOrder = WakafOrder::findOrFail($id);
        $WakafOrder->delete();
        if($WakafOrder){
            return new WakafOrderResource(true, 'WakafOrder berhasil di hapus', $WakafOrder);  
        }
        return new WakafOrderResource(false, 'WakafOrder gagal di hapus', []);  
    }
}