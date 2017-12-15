<?php

namespace App\Repositories;

use App\Models\Parameter;

class ParameterRepository
{
    public function all()
    {
        return Parameter::all();
    }

    public function find($id)
    {
        return Parameter::find($id);
    }
}