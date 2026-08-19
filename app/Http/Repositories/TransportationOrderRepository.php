<?php 
namespace App\Http\Repositories;

use App\Http\Resources\TransportationOrderResource;
use App\Models\TransportationOrder;

class TransportationOrderRepository{
    public function all()
    {
        $TransportationOrders = TransportationOrder::when(
            request()->search, 
            function($TransportationOrders) {
                $TransportationOrders = $TransportationOrders->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $TransportationOrders->appends(['search' => request()->search]);
        return new TransportationOrderResource(true, 'List data TransportationOrder', $TransportationOrders);    
    }

    public function create(array $data)
    {
        $TransportationOrder =  TransportationOrder::create($data);
        if($TransportationOrder){
            return new TransportationOrderResource(true, 'TransportationOrder berhasil di tambahkan', $TransportationOrder);  
        }
        return new TransportationOrderResource(false, 'TransportationOrder gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $TransportationOrder = TransportationOrder::findOrFail($id);
        $TransportationOrder->update($data);
        if($TransportationOrder){
            return new TransportationOrderResource(true, 'TransportationOrder berhasil di ubah', $TransportationOrder);  
        }
        return new TransportationOrderResource(false, 'TransportationOrder gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $TransportationOrder = TransportationOrder::findOrFail($id);
        $TransportationOrder->delete();
        if($TransportationOrder){
            return new TransportationOrderResource(true, 'TransportationOrder berhasil di hapus', $TransportationOrder);  
        }
        return new TransportationOrderResource(false, 'TransportationOrder gagal di hapus', []);  
    }
}