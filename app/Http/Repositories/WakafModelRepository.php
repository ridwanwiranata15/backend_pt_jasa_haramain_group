<?php 
namespace App\Http\Repositories;

use App\Http\Resources\WakafResource;
use App\Models\WakafModel;

class WakafModelRepository{
    public function all()
    {
        $WakafModels = WakafModel::when(
            request()->search, 
            function($WakafModels) {
                $WakafModels = $WakafModels->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $WakafModels->appends(['search' => request()->search]);
        return new WakafResource(true, 'List data WakafModel', $WakafModels);    
    }

    public function create(array $data)
    {
        $WakafModel =  WakafModel::create($data);
        if($WakafModel){
            return new WakafResource(true, 'WakafModel berhasil di tambahkan', $WakafModel);  
        }
        return new WakafResource(false, 'WakafModel gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $WakafModel = WakafModel::findOrFail($id);
        $WakafModel->update($data);
        if($WakafModel){
            return new WakafResource(true, 'WakafModel berhasil di ubah', $WakafModel);  
        }
        return new WakafResource(false, 'WakafModel gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $WakafModel = WakafModel::findOrFail($id);
        $WakafModel->delete();
        if($WakafModel){
            return new WakafResource(true, 'WakafModel berhasil di hapus', $WakafModel);  
        }
        return new WakafResource(false, 'WakafModel gagal di hapus', []);  
    }
}