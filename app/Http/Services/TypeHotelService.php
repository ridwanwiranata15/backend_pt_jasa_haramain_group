<?php
namespace App\Http\Services;

use App\Http\Repositories\TypeHotelRepository;

class TypeHotelService{
    private $TypeHotelRepository;

    public function __construct(TypeHotelRepository $TypeHotelRepository)
    {
        $this->TypeHotelRepository = $TypeHotelRepository;
    }

    public function all()
    {
        return $this->TypeHotelRepository->all();
    }
    public function create(array $data)
    {
        return $this->TypeHotelRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->TypeHotelRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->TypeHotelRepository->delete($id);
    }

}
