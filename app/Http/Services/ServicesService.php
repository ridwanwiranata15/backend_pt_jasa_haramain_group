<?php
namespace App\Http\Services;

use App\Http\Repositories\ServiceRepository;

class ServiceService{
    private $ServiceRepository;

    public function __construct(ServiceRepository $ServiceRepository)
    {
        $this->ServiceRepository = $ServiceRepository;
    }

    public function all()
    {
        return $this->ServiceRepository->all();
    }
    public function create(array $data)
    {
        return $this->ServiceRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->ServiceRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->ServiceRepository->delete($id);
    }

}
