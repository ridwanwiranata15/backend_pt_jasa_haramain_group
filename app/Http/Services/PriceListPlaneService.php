<?php
namespace App\Http\Services;

use App\Http\Repositories\PriceListPlaneRepository;

class PriceListPlaneService{
    private $PriceListPlaneRepository;

    public function __construct(PriceListPlaneRepository $PriceListPlaneRepository)
    {
        $this->PriceListPlaneRepository = $PriceListPlaneRepository;
    }

    public function all()
    {
        return $this->PriceListPlaneRepository->all();
    }
    public function create(array $data)
    {
        return $this->PriceListPlaneRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->PriceListPlaneRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->PriceListPlaneRepository->delete($id);
    }

}
