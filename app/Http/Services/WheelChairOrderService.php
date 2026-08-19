<?php
namespace App\Http\Services;

use App\Http\Repositories\WheelChairOrderRepository;

class WheelChairOrderService{
    private $WheelChairOrderRepository;

    public function __construct(WheelChairOrderRepository $WheelChairOrderRepository)
    {
        $this->WheelChairOrderRepository = $WheelChairOrderRepository;
    }

    public function all()
    {
        return $this->WheelChairOrderRepository->all();
    }
    public function create(array $data)
    {
        return $this->WheelChairOrderRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->WheelChairOrderRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->WheelChairOrderRepository->delete($id);
    }

}
