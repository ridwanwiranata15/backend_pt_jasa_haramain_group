<?php
namespace App\Http\Services;

use App\Http\Repositories\TransactionRepository;
use Illuminate\Http\UploadedFile;

class TransactionService{
    private $TransactionRepository;

    public function __construct(TransactionRepository $TransactionRepository)
    {
        $this->TransactionRepository = $TransactionRepository;
    }

    private function bukti_pembayaran(UploadedFile $bukti_pembayaran)
    {
        $bukti_pembayaran->store('transaction');
        return $bukti_pembayaran->hashName();
    }

    public function all()
    {
        return $this->TransactionRepository->all();
    }
    public function create(array $data)
    {
        if(isset($data['bukti_pembayaran']) && $data['bukti_pembayaran'] instanceof UploadedFile){
            $data['bukti_pembayaran'] = $this->bukti_pembayaran($data['bukti_pembayaran']);
        }
        return $this->TransactionRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        if(isset($data['bukti_pembayaran']) && $data['bukti_pembayaran'] instanceof UploadedFile){
            $data['bukti_pembayaran'] = $this->bukti_pembayaran($data['bukti_pembayaran']);
        }else{
            unset($data['bukti_pembayaran']);
        }
        return $this->TransactionRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->TransactionRepository->delete($id);
    }

}
