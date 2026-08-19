<?php 
namespace App\Http\Repositories;

use App\Http\Resources\TransportationResource;
use App\Models\Transportation;

class TransportationRepository{
    public function all()
    {
        $Transportations = Transportation::when(
            request()->search, 
            function($Transportations) {
                $Transportations = $Transportations->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $Transportations->appends(['search' => request()->search]);
        return new TransportationResource(true, 'List data Transportation', $Transportations);    
    }

    public function create(array $data)
    {
        $Transportation =  Transportation::create($data);
        if($Transportation){
            return new TransportationResource(true, 'Transportation berhasil di tambahkan', $Transportation);  
        }
        return new TransportationResource(false, 'Transportation gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $Transportation = Transportation::findOrFail($id);
        $Transportation->update($data);
        if($Transportation){
            return new TransportationResource(true, 'Transportation berhasil di ubah', $Transportation);  
        }
        return new TransportationResource(false, 'Transportation gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $Transportation = Transportation::findOrFail($id);
        $Transportation->delete();
        if($Transportation){
            return new TransportationResource(true, 'Transportation berhasil di hapus', $Transportation);  
        }
        return new TransportationResource(false, 'Transportation gagal di hapus', []);  
    }
}