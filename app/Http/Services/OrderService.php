<?php
namespace App\Http\Services;

use App\Http\Repositories\OrderRepository;
use Illuminate\Http\UploadedFile;

class OrderService{
    private $OrderRepository;

    public function __construct(OrderRepository $OrderRepository)
    {
        $this->OrderRepository = $OrderRepository;
    }
    private function upload_transfer(UploadedFile $uploadedFile)
    {
        $uploadedFile->store('orders/upload_transfer', 'public');
        return $uploadedFile->hashName();
    }
    private function bukti_pembayaran(UploadedFile $uploadedFile)
    {
        $uploadedFile->store('orders/bukti_pembayaran', 'public');
        return $uploadedFile->hashName();
    }

    public function all()
    {
        return $this->OrderRepository->all();
    }

    public function create(array $data)
    {

        if(isset($data['upload_transfer']) && $data['upload_transfer'] instanceof UploadedFile){
            $data['upload_transfer'] = $this->upload_transfer($data['upload_transfer']);
        }
        if(isset($data['bukti_pembayaran']) && $data['bukti_pembayaran'] instanceof UploadedFile){
            $data['bukti_pembayaran'] = $this->bukti_pembayaran($data['bukti_pembayaran']);
        }
        return $this->OrderRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        if(isset($data['upload_transfer']) && $data['upload_transfer'] instanceof UploadedFile){
            $data['upload_transfer'] = $this->upload_transfer($data['upload_transfer']);
        }else{
            unset($data['paket_info']);
        }
        if(isset($data['bukti_pembayaran']) && $data['bukti_pembayaran'] instanceof UploadedFile){
            $data['bukti_pembayaran'] = $this->bukti_pembayaran($data['bukti_pembayaran']);
        }else{
            unset($data['bukti_pembayaran']);
        }
        return $this->OrderRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->OrderRepository->delete($id);
    }

}
