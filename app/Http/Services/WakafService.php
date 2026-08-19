<?php
namespace App\Http\Services;

use App\Http\Repositories\WakafModelRepository;

class WakafModelService{
    private $WakafModelRepository;

    public function __construct(WakafModelRepository $WakafModelRepository)
    {
        $this->WakafModelRepository = $WakafModelRepository;
    }

    public function all()
    {
        return $this->WakafModelRepository->all();
    }
    public function create(array $data)
    {
        return $this->WakafModelRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->WakafModelRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->WakafModelRepository->delete($id);
    }

}
