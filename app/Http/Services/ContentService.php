<?php
namespace App\Http\Services;

use App\Http\Repositories\ContentRepository;

class ContentService{
    private $ContentRepository;

    public function __construct(ContentRepository $ContentRepository)
    {
        $this->ContentRepository = $ContentRepository;
    }

    public function all()
    {
        return $this->ContentRepository->all();
    }
    public function create(array $data)
    {
        return $this->ContentRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->ContentRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->ContentRepository->delete($id);
    }

}
