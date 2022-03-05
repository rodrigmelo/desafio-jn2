<?php

namespace App\Services;

use App\Services\Contracts\ICustomerService;
use App\Repositories\Contracts\ICustomerRepository;

class CustomerService implements ICustomerService
{
    private $repo;

    public function __construct(ICustomerRepository $repo)
    {
        $this->repo = $repo;
    }

    public function findAll()
    {
        return $this->repo->findAll();
    }

    public function findById($id)
    {
        return $this->repo->findById($id);
    }

    public function add($data)
    {
        return $this->repo->add($data);
    }

    public function update($id, $data)
    {
        return $this->repo->update($id, $data);
    }

    public function remove($id)
    {
        return $this->repo->remove($id);
    }

    public function endOfPlate($plate)
    {
        return $this->repo->endOfPlate($plate);
    }
}
