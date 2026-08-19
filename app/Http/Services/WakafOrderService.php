<?php
namespace App\Http\Services;

use App\Http\Repositories\WakafOrderRepository;

class WakafOrderService{
    private $WakafOrderRepository;

    public function __construct(WakafOrderRepository $WakafOrderRepository)
    {
        $this->WakafOrderRepository = $WakafOrderRepository;
    }

    public function all()
    {
        return $this->WakafOrderRepository->all();
    }
    public function create(array $data)
    {
        return $this->WakafOrderRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->WakafOrderRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->WakafOrderRepository->delete($id);
    }

}
