<?php
namespace App\Http\Services;

use App\Http\Repositories\WheelChairRepository;

class WheelChairService{
    private $WheelChairRepository;

    public function __construct(WheelChairRepository $WheelChairRepository)
    {
        $this->WheelChairRepository = $WheelChairRepository;
    }

    public function all()
    {
        return $this->WheelChairRepository->all();
    }
    public function create(array $data)
    {
        return $this->WheelChairRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->WheelChairRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->WheelChairRepository->delete($id);
    }

}
