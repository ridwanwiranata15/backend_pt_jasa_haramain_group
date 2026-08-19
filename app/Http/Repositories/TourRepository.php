<?php 
namespace App\Http\Repositories;

use App\Http\Resources\TourResource;
use App\Models\Tour;

class TourRepository{
    public function all()
    {
        $Tours = Tour::when(
            request()->search, 
            function($Tours) {
                $Tours = $Tours->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $Tours->appends(['search' => request()->search]);
        return new TourResource(true, 'List data Tour', $Tours);    
    }

    public function create(array $data)
    {
        $Tour =  Tour::create($data);
        if($Tour){
            return new TourResource(true, 'Tour berhasil di tambahkan', $Tour);  
        }
        return new TourResource(false, 'Tour gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $Tour = Tour::findOrFail($id);
        $Tour->update($data);
        if($Tour){
            return new TourResource(true, 'Tour berhasil di ubah', $Tour);  
        }
        return new TourResource(false, 'Tour gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $Tour = Tour::findOrFail($id);
        $Tour->delete();
        if($Tour){
            return new TourResource(true, 'Tour berhasil di hapus', $Tour);  
        }
        return new TourResource(false, 'Tour gagal di hapus', []);  
    }
}