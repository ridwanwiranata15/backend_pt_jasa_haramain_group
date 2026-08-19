<?php 
namespace App\Http\Repositories;

use App\Http\Resources\WheelChairResource;
use App\Models\WheelChair;

class WheelChairRepository{
    public function all()
    {
        $WheelChairs = WheelChair::when(
            request()->search, 
            function($WheelChairs) {
                $WheelChairs = $WheelChairs->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $WheelChairs->appends(['search' => request()->search]);
        return new WheelChairResource(true, 'List data WheelChair', $WheelChairs);    
    }

    public function create(array $data)
    {
        $WheelChair =  WheelChair::create($data);
        if($WheelChair){
            return new WheelChairResource(true, 'WheelChair berhasil di tambahkan', $WheelChair);  
        }
        return new WheelChairResource(false, 'WheelChair gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $WheelChair = WheelChair::findOrFail($id);
        $WheelChair->update($data);
        if($WheelChair){
            return new WheelChairResource(true, 'WheelChair berhasil di ubah', $WheelChair);  
        }
        return new WheelChairResource(false, 'WheelChair gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $WheelChair = WheelChair::findOrFail($id);
        $WheelChair->delete();
        if($WheelChair){
            return new WheelChairResource(true, 'WheelChair berhasil di hapus', $WheelChair);  
        }
        return new WheelChairResource(false, 'WheelChair gagal di hapus', []);  
    }
}