<?php
namespace App\Http\Repositories;

use App\Http\Resources\GuideResource;
use App\Models\Guide;

class GuideRepository{
    public function all()
    {
        $Guides = Guide::when(
            request()->search,
            function($Guides) {
                $Guides = $Guides->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $Guides->appends(['search' => request()->search]);
        return new GuideResource(true, 'List data Guide', $Guides);
    }

    public function create(array $data)
    {
        $Guide =  Guide::create($data);
        if($Guide){
            return new GuideResource(true, 'Guide berhasil di tambahkan', $Guide);
        }
        return new GuideResource(false, 'Guide gagal di tambahkan', []);
    }
    public function update(array $data, int $id)
    {
        $Guide = Guide::findOrFail($id);
        $Guide->update($data);
        if($Guide){
            return new GuideResource(true, 'Guide berhasil di ubah', $Guide);
        }
        return new GuideResource(false, 'Guide gagal di ubah', []);
    }
    public function delete(int $id)
    {
        $Guide = Guide::findOrFail($id);
        $Guide->delete();
        if($Guide){
            return new GuideResource(true, 'Guide berhasil di hapus', $Guide);
        }
        return new GuideResource(false, 'Guide gagal di hapus', []);
    }
}

