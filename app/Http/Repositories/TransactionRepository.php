<?php 
namespace App\Http\Repositories;

use App\Http\Resources\TransactionResource;
use App\Models\Transaction;

class TransactionRepository{
    public function all()
    {
        $Transactions = Transaction::when(
            request()->search, 
            function($Transactions) {
                $Transactions = $Transactions->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $Transactions->appends(['search' => request()->search]);
        return new TransactionResource(true, 'List data Transaction', $Transactions);    
    }

    public function create(array $data)
    {
        $Transaction =  Transaction::create($data);
        if($Transaction){
            return new TransactionResource(true, 'Transaction berhasil di tambahkan', $Transaction);  
        }
        return new TransactionResource(false, 'Transaction gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $Transaction = Transaction::findOrFail($id);
        $Transaction->update($data);
        if($Transaction){
            return new TransactionResource(true, 'Transaction berhasil di ubah', $Transaction);  
        }
        return new TransactionResource(false, 'Transaction gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $Transaction = Transaction::findOrFail($id);
        $Transaction->delete();
        if($Transaction){
            return new TransactionResource(true, 'Transaction berhasil di hapus', $Transaction);  
        }
        return new TransactionResource(false, 'Transaction gagal di hapus', []);  
    }
}