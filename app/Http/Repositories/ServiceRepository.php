<?php 
namespace App\Http\Repositories;

use App\Http\Resources\ServiceResource;
use App\Models\Service;

class ServiceRepository{
    public function all()
    {
        $Services = Service::when(
            request()->search, 
            function($Services) {
                $Services = $Services->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $Services->appends(['search' => request()->search]);
        return new ServiceResource(true, 'List data Service', $Services);    
    }

    public function create(array $data)
    {
        $Service =  Service::create($data);
        if($Service){
            return new ServiceResource(true, 'Service berhasil di tambahkan', $Service);  
        }
        return new ServiceResource(false, 'Service gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $Service = Service::findOrFail($id);
        $Service->update($data);
        if($Service){
            return new ServiceResource(true, 'Service berhasil di ubah', $Service);  
        }
        return new ServiceResource(false, 'Service gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $Service = Service::findOrFail($id);
        $Service->delete();
        if($Service){
            return new ServiceResource(true, 'Service berhasil di hapus', $Service);  
        }
        return new ServiceResource(false, 'Service gagal di hapus', []);  
    }
}