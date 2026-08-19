<?php 
namespace App\Http\Repositories;

use App\Http\Resources\BadalResource;
use App\Models\Badal;

class BadalRepository{
    public function all()
    {
        $badals = Badal::when(
            request()->search, 
            function($badals) {
                $badals = $badals->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $badals->appends(['search' => request()->search]);
        return new BadalResource(true, 'List data badal', $badals);    
    }

    public function create(array $data)
    {
        $badal =  Badal::create($data);
        if($badal){
            return new BadalResource(true, 'Badal berhasil di tambahkan', $badal);  
        }
        return new BadalResource(false, 'Badal gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $badal = Badal::findOrFail($id);
        $badal->update($data);
        if($badal){
            return new BadalResource(true, 'Badal berhasil di ubah', $badal);  
        }
        return new BadalResource(false, 'Badal gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $badal = Badal::findOrFail($id);
        $badal->delete();
        if($badal){
            return new BadalResource(true, 'Badal berhasil di hapus', $badal);  
        }
        return new BadalResource(false, 'Badal gagal di hapus', []);  
    }
}