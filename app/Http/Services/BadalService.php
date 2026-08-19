<?php
namespace App\Http\Services;

use App\Http\Repositories\BadalRepository;

class BadalService{
    private $BadalRepository;

    public function __construct(BadalRepository $badalRepository)
    {
        $this->BadalRepository = $badalRepository;
    }

    public function all()
    {
        return $this->BadalRepository->all();
    }
    public function create(array $data)
    {
        return $this->BadalRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->BadalRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->BadalRepository->delete($id);
    }

}
