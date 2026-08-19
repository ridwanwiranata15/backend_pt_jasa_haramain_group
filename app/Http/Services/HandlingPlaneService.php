<?php
namespace App\Http\Services;

use App\Http\Repositories\HandlingPlaneRepository;
use Illuminate\Http\UploadedFile;

class HandlingPlaneService{
    private $HandlingPlaneRepository;

    public function __construct(HandlingPlaneRepository $HandlingPlaneRepository)
    {
        $this->HandlingPlaneRepository = $HandlingPlaneRepository;
    }
    private function paketInfo(UploadedFile $uploadedFile)
    {
        $uploadedFile->store('handling/Planes/paket_info', 'public');
        return $uploadedFile->hashName();
    }
    private function identitas_koper(UploadedFile $uploadedFile)
    {
        $uploadedFile->store('handling/Planes/luggage_tags', 'public');
        return $uploadedFile->hashName();
    }

    public function all()
    {
        return $this->HandlingPlaneRepository->all();
    }

    public function create(array $data)
    {

        if(isset($data['paket_info']) && $data['paket_info'] instanceof UploadedFile){
            $data['paket_info'] = $this->paketInfo($data['paket_info']);
        }
        if(isset($data['identitas_koper']) && $data['identitas_koper'] instanceof UploadedFile){
            $data['identitas_koper'] = $this->identitas_koper($data['identitas_koper']);
        }
        return $this->HandlingPlaneRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        if(isset($data['paket_info']) && $data['paket_info'] instanceof UploadedFile){
            $data['paket_info'] = $this->paketInfo($data['paket_info']);
        }else{
            unset($data['paket_info']);
        }
        if(isset($data['identitas_koper']) && $data['identitas_koper'] instanceof UploadedFile){
            $data['identitas_koper'] = $this->identitas_koper($data['identitas_koper']);
        }else{
            unset($data['identitas_koper']);
        }
        return $this->HandlingPlaneRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->HandlingPlaneRepository->delete($id);
    }

}
