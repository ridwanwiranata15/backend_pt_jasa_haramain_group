<?php
namespace App\Http\Services;

use App\Http\Repositories\ContentOrderRepository;

class ContentOrderService{
    private $ContentOrderRepository;

    public function __construct(ContentOrderRepository $ContentOrderRepository)
    {
        $this->ContentOrderRepository = $ContentOrderRepository;
    }

    public function all()
    {
        return $this->ContentOrderRepository->all();
    }
    public function create(array $data)
    {
        return $this->ContentOrderRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->ContentOrderRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->ContentOrderRepository->delete($id);
    }

}
