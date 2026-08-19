<?php
namespace App\Http\Services;

use App\Http\Repositories\HotelRepository;

class HotelService{
    private $HotelRepository;

    public function __construct(HotelRepository $HotelRepository)
    {
        $this->HotelRepository = $HotelRepository;
    }

    public function all()
    {
        return $this->HotelRepository->all();
    }
    public function create(array $data)
    {
        return $this->HotelRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->HotelRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->HotelRepository->delete($id);
    }

}
