<?php
namespace App\Http\Services;

use App\Http\Repositories\DocumentDetailRepository;

class DocumentDetailService{
    private $DocumentDetailRepository;

    public function __construct(DocumentDetailRepository $DocumentDetailRepository)
    {
        $this->DocumentDetailRepository = $DocumentDetailRepository;
    }

    public function all()
    {
        return $this->DocumentDetailRepository->all();
    }
    public function create(array $data)
    {
        return $this->DocumentDetailRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->DocumentDetailRepository->update($data,$id);
    }
    public function delete(int $id)
    {
        return $this->DocumentDetailRepository->delete($id);
    }

}
