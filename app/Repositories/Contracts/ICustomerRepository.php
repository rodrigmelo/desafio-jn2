<?php

namespace App\Repositories\Contracts;

interface ICustomerRepository
{
    public function findAll();
    public function findById($id);
    public function add($data);
    public function update($id, $data);
    public function remove($id);
    public function endOfPlate($plate);
}
