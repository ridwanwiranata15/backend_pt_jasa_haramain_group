<?php
namespace App\Http\Services;

use App\Http\Repositories\FoodOrderRepository;

class FoodOrderService{
    private $FoodOrderRepository;

    public function __construct(FoodOrderRepository $FoodOrderRepository)
    {
        $this->FoodOrderRepository = $FoodOrderRepository;
    }

    public function all()
    {
        return $this->FoodOrderRepository->all();
    }
    public function create(array $data)
    {
        return $this->FoodOrderRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->FoodOrderRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->FoodOrderRepository->delete($id);
    }

}
