<?php
namespace App\Http\Services;

use App\Http\Repositories\GuideRepository;

class GuideService{
    private $GuideRepository;

    public function __construct(GuideRepository $GuideRepository)
    {
        $this->GuideRepository = $GuideRepository;
    }

    public function all()
    {
        return $this->GuideRepository->all();
    }
    public function create(array $data)
    {
        return $this->GuideRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->GuideRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->GuideRepository->delete($id);
    }

}
