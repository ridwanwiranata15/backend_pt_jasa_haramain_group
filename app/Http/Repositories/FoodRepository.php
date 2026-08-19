<?php 
namespace App\Http\Repositories;

use App\Http\Resources\FoodResource;
use App\Models\Food;

class FoodRepository{
    public function all()
    {
        $Foods = Food::when(
            request()->search, 
            function($Foods) {
                $Foods = $Foods->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $Foods->appends(['search' => request()->search]);
        return new FoodResource(true, 'List data Food', $Foods);    
    }

    public function create(array $data)
    {
        $Food =  Food::create($data);
        if($Food){
            return new FoodResource(true, 'Food berhasil di tambahkan', $Food);  
        }
        return new FoodResource(false, 'Food gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $Food = Food::findOrFail($id);
        $Food->update($data);
        if($Food){
            return new FoodResource(true, 'Food berhasil di ubah', $Food);  
        }
        return new FoodResource(false, 'Food gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $Food = Food::findOrFail($id);
        $Food->delete();
        if($Food){
            return new FoodResource(true, 'Food berhasil di hapus', $Food);  
        }
        return new FoodResource(false, 'Food gagal di hapus', []);  
    }
}