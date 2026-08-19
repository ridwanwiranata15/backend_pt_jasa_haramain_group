<?php
namespace App\Http\Services;

use App\Http\Repositories\TransportationRepository;

class TransportationService{
    private $TransportationRepository;

    public function __construct(TransportationRepository $TransportationRepository)
    {
        $this->TransportationRepository = $TransportationRepository;
    }

    public function all()
    {
        return $this->TransportationRepository->all();
    }
    public function create(array $data)
    {
        return $this->TransportationRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->TransportationRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->TransportationRepository->delete($id);
    }

}
