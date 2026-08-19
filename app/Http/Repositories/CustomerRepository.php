<?php 
namespace App\Http\Repositories;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;

class CustomerRepository{
    public function all()
    {
        $Customers = Customer::when(
            request()->search, 
            function($Customers) {
                $Customers = $Customers->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $Customers->appends(['search' => request()->search]);
        return new CustomerResource(true, 'List data Customer', $Customers);    
    }

    public function create(array $data)
    {
        $Customer =  Customer::create($data);
        if($Customer){
            return new CustomerResource(true, 'Customer berhasil di tambahkan', $Customer);  
        }
        return new CustomerResource(false, 'Customer gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $Customer = Customer::findOrFail($id);
        $Customer->update($data);
        if($Customer){
            return new CustomerResource(true, 'Customer berhasil di ubah', $Customer);  
        }
        return new CustomerResource(false, 'Customer gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $Customer = Customer::findOrFail($id);
        $Customer->delete();
        if($Customer){
            return new CustomerResource(true, 'Customer berhasil di hapus', $Customer);  
        }
        return new CustomerResource(false, 'Customer gagal di hapus', []);  
    }
}