<?php
namespace App\Http\Services;

use App\Http\Repositories\TourRepository;

class TourService{
    private $TourRepository;

    public function __construct(TourRepository $TourRepository)
    {
        $this->TourRepository = $TourRepository;
    }

    public function all()
    {
        return $this->TourRepository->all();
    }
    public function create(array $data)
    {
        return $this->TourRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->TourRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->TourRepository->delete($id);
    }

}
