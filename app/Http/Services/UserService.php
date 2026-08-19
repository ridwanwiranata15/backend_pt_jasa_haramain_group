<?php
namespace App\Http\Services;

use App\Http\Repositories\UserRepository;

class UserService{
    private $UserRepository;

    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function all()
    {
        return $this->UserRepository->all();
    }
    public function create(array $data)
    {
        return $this->UserRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->UserRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->UserRepository->delete($id);
    }

}
