<?php
namespace App\Http\Services;

use App\Http\Repositories\RouteRepository;

class RouteService{
    private $RouteRepository;

    public function __construct(RouteRepository $RouteRepository)
    {
        $this->RouteRepository = $RouteRepository;
    }

    public function all()
    {
        return $this->RouteRepository->all();
    }
    public function create(array $data)
    {
        return $this->RouteRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->RouteRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->RouteRepository->delete($id);
    }

}
