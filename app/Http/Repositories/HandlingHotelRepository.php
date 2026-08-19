<?php 
namespace App\Http\Repositories;

use App\Http\Resources\HandlingHotelResource;
use App\Models\HandlingHotel;

class HandlingHotelRepository{
    public function all()
    {
        $HandlingHotels = HandlingHotel::when(
            request()->search, 
            function($HandlingHotels) {
                $HandlingHotels = $HandlingHotels->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $HandlingHotels->appends(['search' => request()->search]);
        return new HandlingHotelResource(true, 'List data HandlingHotel', $HandlingHotels);    
    }

    public function create(array $data)
    {
        $HandlingHotel =  HandlingHotel::create($data);
        if($HandlingHotel){
            return new HandlingHotelResource(true, 'HandlingHotel berhasil di tambahkan', $HandlingHotel);  
        }
        return new HandlingHotelResource(false, 'HandlingHotel gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $HandlingHotel = HandlingHotel::findOrFail($id);
        $HandlingHotel->update($data);
        if($HandlingHotel){
            return new HandlingHotelResource(true, 'HandlingHotel berhasil di ubah', $HandlingHotel);  
        }
        return new HandlingHotelResource(false, 'HandlingHotel gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $HandlingHotel = HandlingHotel::findOrFail($id);
        $HandlingHotel->delete();
        if($HandlingHotel){
            return new HandlingHotelResource(true, 'HandlingHotel berhasil di hapus', $HandlingHotel);  
        }
        return new HandlingHotelResource(false, 'HandlingHotel gagal di hapus', []);  
    }
}