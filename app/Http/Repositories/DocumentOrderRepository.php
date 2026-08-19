<?php
namespace App\Http\Repositories;

use App\Http\Resources\DocumentOrderResource;
use App\Models\DocumentOrder;

class DocumentOrderRepository{
    public function all()
    {
        $DocumentOrders = DocumentOrder::when(
            request()->search,
            function($DocumentOrders) {
                $DocumentOrders = $DocumentOrders->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $DocumentOrders->appends(['search' => request()->search]);
        return new DocumentOrderResource(true, 'List data DocumentOrder', $DocumentOrders);
    }

    public function create(array $data)
    {
        $DocumentOrder =  DocumentOrder::create($data);
        if($DocumentOrder){
            return new DocumentOrderResource(true, 'DocumentOrder berhasil di tambahkan', $DocumentOrder);
        }
        return new DocumentOrderResource(false, 'DocumentOrder gagal di tambahkan', []);
    }
    public function update(array $data, int $id)
    {
        $DocumentOrder = DocumentOrder::findOrFail($id);
        $DocumentOrder->update($data);
        if($DocumentOrder){
            return new DocumentOrderResource(true, 'DocumentOrder berhasil di ubah', $DocumentOrder);
        }
        return new DocumentOrderResource(false, 'DocumentOrder gagal di ubah', []);
    }
    public function delete(int $id)
    {
        $DocumentOrder = DocumentOrder::findOrFail($id);
        $DocumentOrder->delete();
        if($DocumentOrder){
            return new DocumentOrderResource(true, 'DocumentOrder berhasil di hapus', $DocumentOrder);
        }
        return new DocumentOrderResource(false, 'DocumentOrder gagal di hapus', []);
    }
}
