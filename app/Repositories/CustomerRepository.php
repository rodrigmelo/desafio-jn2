<?php

namespace App\Repositories;

use App\Customer;
use App\Repositories\Contracts\ICustomerRepository;

class CustomerRepository implements ICustomerRepository
{
    private $model;

    public function __construct(Customer $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        return $this->model->get();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function add($data)
    {
        $this->model->fill($data);
        $this->model->save();
        return $this->model;
    }

    public function update($id, $data)
    {
        if (!$obj = $this->model->find($id))
            return null;
        $obj->fill($data);
        $obj->save();
        return $obj;
    }

    public function remove($id)
    {
        if (!$obj = $this->model->find($id))
            return null;
        return $obj->delete();
    }

    public function endOfPlate($plate)
    {
        return $this->model->where('license_plate', 'like', "%$plate")->get();
    }
}
