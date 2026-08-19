<?php 
namespace App\Http\Repositories;

use App\Http\Resources\OrderResource;
use App\Models\Order;

class OrderRepository{
    public function all()
    {
        $Orders = Order::when(
            request()->search, 
            function($Orders) {
                $Orders = $Orders->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $Orders->appends(['search' => request()->search]);
        return new OrderResource(true, 'List data Order', $Orders);    
    }

    public function create(array $data)
    {
        $Order =  Order::create($data);
        if($Order){
            return new OrderResource(true, 'Order berhasil di tambahkan', $Order);  
        }
        return new OrderResource(false, 'Order gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $Order = Order::findOrFail($id);
        $Order->update($data);
        if($Order){
            return new OrderResource(true, 'Order berhasil di ubah', $Order);  
        }
        return new OrderResource(false, 'Order gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $Order = Order::findOrFail($id);
        $Order->delete();
        if($Order){
            return new OrderResource(true, 'Order berhasil di hapus', $Order);  
        }
        return new OrderResource(false, 'Order gagal di hapus', []);  
    }
}