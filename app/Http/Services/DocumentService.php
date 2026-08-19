<?php
namespace App\Http\Services;

use App\Http\Repositories\DocumentRepository;

class DocumentService{
    private $DocumentRepository;

    public function __construct(DocumentRepository $DocumentRepository)
    {
        $this->DocumentRepository = $DocumentRepository;
    }

    public function all()
    {
        return $this->DocumentRepository->all();
    }
    public function create(array $data)
    {
        return $this->DocumentRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->DocumentRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->DocumentRepository->delete($id);
    }

}
