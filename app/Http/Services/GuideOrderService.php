<?php
namespace App\Http\Services;

use App\Http\Repositories\GuideOrderRepository;

class GuideOrderService{
    private $GuideOrderRepository;

    public function __construct(GuideOrderRepository $GuideOrderRepository)
    {
        $this->GuideOrderRepository = $GuideOrderRepository;
    }

    public function all()
    {
        return $this->GuideOrderRepository->all();
    }
    public function create(array $data)
    {
        return $this->GuideOrderRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->GuideOrderRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->GuideOrderRepository->delete($id);
    }

}
