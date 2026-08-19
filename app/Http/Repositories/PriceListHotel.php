<?php 
namespace App\Http\Repositories;

use App\Http\Resources\PriceListHotelResource;
use App\Models\PriceListHotel;

class PriceListHotelRepository{
    public function all()
    {
        $PriceListHotels = PriceListHotel::when(
            request()->search, 
            function($PriceListHotels) {
                $PriceListHotels = $PriceListHotels->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $PriceListHotels->appends(['search' => request()->search]);
        return new PriceListHotelResource(true, 'List data PriceListHotel', $PriceListHotels);    
    }

    public function create(array $data)
    {
        $PriceListHotel =  PriceListHotel::create($data);
        if($PriceListHotel){
            return new PriceListHotelResource(true, 'PriceListHotel berhasil di tambahkan', $PriceListHotel);  
        }
        return new PriceListHotelResource(false, 'PriceListHotel gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $PriceListHotel = PriceListHotel::findOrFail($id);
        $PriceListHotel->update($data);
        if($PriceListHotel){
            return new PriceListHotelResource(true, 'PriceListHotel berhasil di ubah', $PriceListHotel);  
        }
        return new PriceListHotelResource(false, 'PriceListHotel gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $PriceListHotel = PriceListHotel::findOrFail($id);
        $PriceListHotel->delete();
        if($PriceListHotel){
            return new PriceListHotelResource(true, 'PriceListHotel berhasil di hapus', $PriceListHotel);  
        }
        return new PriceListHotelResource(false, 'PriceListHotel gagal di hapus', []);  
    }
}