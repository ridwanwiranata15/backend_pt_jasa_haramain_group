<?php
namespace App\Http\Services;

use App\Http\Repositories\FoodRepository;

class FoodService{
    private $FoodRepository;

    public function __construct(FoodRepository $FoodRepository)
    {
        $this->FoodRepository = $FoodRepository;
    }

    public function all()
    {
        return $this->FoodRepository->all();
    }
    public function create(array $data)
    {
        return $this->FoodRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->FoodRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->FoodRepository->delete($id);
    }

}
