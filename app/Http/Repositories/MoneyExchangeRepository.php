<?php 
namespace App\Http\Repositories;

use App\Http\Resources\MoneyExchangeResource;
use App\Models\MoneyExchange;

class MoneyExchangeRepository{
    public function all()
    {
        $MoneyExchanges = MoneyExchange::when(
            request()->search, 
            function($MoneyExchanges) {
                $MoneyExchanges = $MoneyExchanges->where('name', 'like', '%'.request()->search.'%');
            })->latest()->paginate(5);
        $MoneyExchanges->appends(['search' => request()->search]);
        return new MoneyExchangeResource(true, 'List data MoneyExchange', $MoneyExchanges);    
    }

    public function create(array $data)
    {
        $MoneyExchange =  MoneyExchange::create($data);
        if($MoneyExchange){
            return new MoneyExchangeResource(true, 'MoneyExchange berhasil di tambahkan', $MoneyExchange);  
        }
        return new MoneyExchangeResource(false, 'MoneyExchange gagal di tambahkan', []);  
    }
    public function update(array $data, int $id)
    {
        $MoneyExchange = MoneyExchange::findOrFail($id);
        $MoneyExchange->update($data);
        if($MoneyExchange){
            return new MoneyExchangeResource(true, 'MoneyExchange berhasil di ubah', $MoneyExchange);  
        }
        return new MoneyExchangeResource(false, 'MoneyExchange gagal di ubah', []);  
    }
    public function delete(int $id)
    {
        $MoneyExchange = MoneyExchange::findOrFail($id);
        $MoneyExchange->delete();
        if($MoneyExchange){
            return new MoneyExchangeResource(true, 'MoneyExchange berhasil di hapus', $MoneyExchange);  
        }
        return new MoneyExchangeResource(false, 'MoneyExchange gagal di hapus', []);  
    }
}