<?php
namespace App\Http\Services;

use App\Http\Repositories\HandlingHotelRepository;
use Illuminate\Http\UploadedFile;

class HandlingHotelService{
    private $HandlingHotelRepository;

    public function __construct(HandlingHotelRepository $HandlingHotelRepository)
    {
        $this->HandlingHotelRepository = $HandlingHotelRepository;
    }
    private function kode_booking(UploadedFile $uploadedFile)
    {
        $uploadedFile->store('handling/hotels/booking_codes', 'public');
        return $uploadedFile->hashName();
    }
    private function rumlis(UploadedFile $uploadedFile)
    {
        $uploadedFile->store('handling/hotels/room_lists', 'public');
        return $uploadedFile->hashName();
    }
    private function identitas_koper(UploadedFile $uploadedFile)
    {
        $uploadedFile->store('handling/hotels/luggage_tags', 'public');
        return $uploadedFile->hashName();
    }

    public function all()
    {
        return $this->HandlingHotelRepository->all();
    }

    public function create(array $data)
    {
        if(isset($data['kode_booking']) && $data['kode_booking'] instanceof UploadedFile){
            $data['kode_booking'] = $this->kode_booking($data['kode_booking']);
        }
        if(isset($data['rumlis']) && $data['rumlis'] instanceof UploadedFile){
            $data['rumlis'] = $this->rumlis($data['rumlis']);
        }
        if(isset($data['identitas_koper']) && $data['identitas_koper'] instanceof UploadedFile){
            $data['identitas_koper'] = $this->identitas_koper($data['identitas_koper']);
        }
        return $this->HandlingHotelRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        if(isset($data['kode_booking']) && $data['kode_booking'] instanceof UploadedFile){
            $data['kode_booking'] = $this->kode_booking($data['kode_booking']);
        }
        if(isset($data['rumlis']) && $data['rumlis'] instanceof UploadedFile){
            $data['rumlis'] = $this->rumlis($data['rumlis']);
        }
        if(isset($data['identitas_koper']) && $data['identitas_koper'] instanceof UploadedFile){
            $data['identitas_koper'] = $this->identitas_koper($data['identitas_koper']);
        }
        return $this->HandlingHotelRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->HandlingHotelRepository->delete($id);
    }

}
