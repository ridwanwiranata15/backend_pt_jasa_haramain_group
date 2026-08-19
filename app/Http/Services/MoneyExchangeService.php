<?php
namespace App\Http\Services;

use App\Http\Repositories\MoneyExchangeRepository;

class MoneyExchangeService{
    private $MoneyExchangeRepository;

    public function __construct(MoneyExchangeRepository $MoneyExchangeRepository)
    {
        $this->MoneyExchangeRepository = $MoneyExchangeRepository;
    }

    public function all()
    {
        return $this->MoneyExchangeRepository->all();
    }
    public function create(array $data)
    {
        return $this->MoneyExchangeRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->MoneyExchangeRepository->update($data, $id);
    }
    public function delete(int $id)
    {
        return $this->MoneyExchangeRepository->delete($id);
    }

}
