<?php 
namespace App\Http\Repositories;

use App\Http\Resources\UserResource;
use App\Models\User;

class UserRepository{
    public function all()
    {
        $Users = User::when(
            request()->search, 
            function($Users) {
                $Users = $Users->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $Users->appends(['search' => request()->search]);
        return new UserResource(true, 'List data User', $Users);    
    }

    public function create(array $data)
    {
        $User =  User::create($data);
        if($User){
            return new UserResource(true, 'User berhasil di tambahkan', $User);  
        }
        return new UserResource(false, 'User gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $User = User::findOrFail($id);
        $User->update($data);
        if($User){
            return new UserResource(true, 'User berhasil di ubah', $User);  
        }
        return new UserResource(false, 'User gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $User = User::findOrFail($id);
        $User->delete();
        if($User){
            return new UserResource(true, 'User berhasil di hapus', $User);  
        }
        return new UserResource(false, 'User gagal di hapus', []);  
    }
}