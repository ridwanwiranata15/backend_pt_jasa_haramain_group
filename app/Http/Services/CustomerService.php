<?php
namespace App\Http\Services;

use App\Http\Repositories\CustomerRepository;
use Illuminate\Http\UploadedFile;

class CustomerService{
    private $CustomerRepository;

    public function __construct(CustomerRepository $CustomerRepository)
    {
        $this->CustomerRepository = $CustomerRepository;
    }

    private function UploadFoto(UploadedFile $uploadedFile)
    {
        $uploadedFile->store('customers', 'public');
        return $uploadedFile->hashName();
    }

    public function all()
    {
        return $this->CustomerRepository->all();
    }
    public function create(array $data)
    {
        if(isset($data['foto']) && $data['foto'] instanceof UploadedFile){
            $data['foto'] = $this->UploadFoto($data['foto']);
        }
        return $this->CustomerRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        if(isset($data['foto']) && $data['foto'] instanceof UploadedFile){
            $data['foto'] = $this->UploadFoto($data['foto']);
        }else{
            unset($data['foto']);
        }
        return $this->CustomerRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->CustomerRepository->delete($id);
    }

}
