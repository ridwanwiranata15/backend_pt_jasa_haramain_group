<?php
namespace App\Http\Services;

use App\Http\Repositories\PriceListHotelRepository;

class PriceListHotelService{
    private $PriceListHotelRepository;

    public function __construct(PriceListHotelRepository $PriceListHotelRepository)
    {
        $this->PriceListHotelRepository = $PriceListHotelRepository;
    }

    public function all()
    {
        return $this->PriceListHotelRepository->all();
    }
    public function create(array $data)
    {
        return $this->PriceListHotelRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->PriceListHotelRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->PriceListHotelRepository->delete($id);
    }

}
