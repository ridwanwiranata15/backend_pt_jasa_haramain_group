<?php 
namespace App\Http\Repositories;

use App\Http\Resources\TypeHotelResource;
use App\Models\TypeHotel;

class TypeHotelRepository{
    public function all()
    {
        $TypeHotels = TypeHotel::when(
            request()->search, 
            function($TypeHotels) {
                $TypeHotels = $TypeHotels->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $TypeHotels->appends(['search' => request()->search]);
        return new TypeHotelResource(true, 'List data TypeHotel', $TypeHotels);    
    }

    public function create(array $data)
    {
        $TypeHotel =  TypeHotel::create($data);
        if($TypeHotel){
            return new TypeHotelResource(true, 'TypeHotel berhasil di tambahkan', $TypeHotel);  
        }
        return new TypeHotelResource(false, 'TypeHotel gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $TypeHotel = TypeHotel::findOrFail($id);
        $TypeHotel->update($data);
        if($TypeHotel){
            return new TypeHotelResource(true, 'TypeHotel berhasil di ubah', $TypeHotel);  
        }
        return new TypeHotelResource(false, 'TypeHotel gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $TypeHotel = TypeHotel::findOrFail($id);
        $TypeHotel->delete();
        if($TypeHotel){
            return new TypeHotelResource(true, 'TypeHotel berhasil di hapus', $TypeHotel);  
        }
        return new TypeHotelResource(false, 'TypeHotel gagal di hapus', []);  
    }
}