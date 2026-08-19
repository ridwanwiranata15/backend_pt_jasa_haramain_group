<?php 
namespace App\Http\Repositories;

use App\Http\Resources\HotelResource;
use App\Models\Hotel;

class HotelRepository{
    public function all()
    {
        $Hotels = Hotel::when(
            request()->search, 
            function($Hotels) {
                $Hotels = $Hotels->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $Hotels->appends(['search' => request()->search]);
        return new HotelResource(true, 'List data Hotel', $Hotels);    
    }

    public function create(array $data)
    {
        $Hotel =  Hotel::create($data);
        if($Hotel){
            return new HotelResource(true, 'Hotel berhasil di tambahkan', $Hotel);  
        }
        return new HotelResource(false, 'Hotel gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $Hotel = Hotel::findOrFail($id);
        $Hotel->update($data);
        if($Hotel){
            return new HotelResource(true, 'Hotel berhasil di ubah', $Hotel);  
        }
        return new HotelResource(false, 'Hotel gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $Hotel = Hotel::findOrFail($id);
        $Hotel->delete();
        if($Hotel){
            return new HotelResource(true, 'Hotel berhasil di hapus', $Hotel);  
        }
        return new HotelResource(false, 'Hotel gagal di hapus', []);  
    }
}