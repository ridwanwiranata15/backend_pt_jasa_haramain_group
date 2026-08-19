<?php 
namespace App\Http\Repositories;

use App\Http\Resources\RouteResource;
use App\Models\Route;

class RouteRepository{
    public function all()
    {
        $Routes = Route::when(
            request()->search, 
            function($Routes) {
                $Routes = $Routes->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $Routes->appends(['search' => request()->search]);
        return new RouteResource(true, 'List data Route', $Routes);    
    }

    public function create(array $data)
    {
        $Route =  Route::create($data);
        if($Route){
            return new RouteResource(true, 'Route berhasil di tambahkan', $Route);  
        }
        return new RouteResource(false, 'Route gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $Route = Route::findOrFail($id);
        $Route->update($data);
        if($Route){
            return new RouteResource(true, 'Route berhasil di ubah', $Route);  
        }
        return new RouteResource(false, 'Route gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $Route = Route::findOrFail($id);
        $Route->delete();
        if($Route){
            return new RouteResource(true, 'Route berhasil di hapus', $Route);  
        }
        return new RouteResource(false, 'Route gagal di hapus', []);  
    }
}