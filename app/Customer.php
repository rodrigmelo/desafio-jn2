<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'cellphone', 'cpf', 'license_plate'
    ];
}
