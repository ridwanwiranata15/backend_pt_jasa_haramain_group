<?php
namespace App\Http\Services;

use App\Http\Repositories\TransactionRepository;

class TransactionService{
    private $TransactionRepository;

    public function __construct(TransactionRepository $TransactionRepository)
    {
        $this->TransactionRepository = $TransactionRepository;
    }

    public function all()
    {
        return $this->TransactionRepository->all();
    }
    public function create(array $data)
    {
        return $this->TransactionRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->TransactionRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->TransactionRepository->delete($id);
    }

}
