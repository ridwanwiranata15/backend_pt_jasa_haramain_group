<?php
namespace App\Http\Services;

use App\Http\Repositories\TravelDocumentRepository;

class TravelDocumentService{
    private $TravelDocumentRepository;

    public function __construct(TravelDocumentRepository $TravelDocumentRepository)
    {
        $this->TravelDocumentRepository = $TravelDocumentRepository;
    }

    public function all()
    {
        return $this->TravelDocumentRepository->all();
    }
    public function create(array $data)
    {
        return $this->TravelDocumentRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->TravelDocumentRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->TravelDocumentRepository->delete($id);
    }

}
