<?php
namespace App\Http\Services;

use App\Http\Repositories\DocumentOrderRepository;

class DocumentOrderService{
    private $DocumentOrderRepository;

    public function __construct(DocumentOrderRepository $DocumentOrderRepository)
    {
        $this->DocumentOrderRepository = $DocumentOrderRepository;
    }

    public function all()
    {
        return $this->DocumentOrderRepository->all();
    }
    public function create(array $data)
    {
        return $this->DocumentOrderRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->DocumentOrderRepository->update($data,$id);
    }
    public function delete(int $id)
    {
        return $this->DocumentOrderRepository->delete($id);
    }

}
