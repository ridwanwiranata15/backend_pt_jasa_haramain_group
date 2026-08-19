<?php
namespace App\Http\Services;

use App\Http\Repositories\TransportationOrderRepository;

class TransportationOrderService{
    private $TransportationOrderRepository;

    public function __construct(TransportationOrderRepository $TransportationOrderRepository)
    {
        $this->TransportationOrderRepository = $TransportationOrderRepository;
    }

    public function all()
    {
        return $this->TransportationOrderRepository->all();
    }
    public function create(array $data)
    {
        return $this->TransportationOrderRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->TransportationOrderRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->TransportationOrderRepository->delete($id);
    }

}
