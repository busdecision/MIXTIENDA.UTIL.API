<?php

namespace App\Repositories;

use App\Models\Province;

class ProvinceRepository
{
    public function all()
    {
        return Province::all();
    }

    public function find($id)
    {
        return Province::find($id);
    }

    public function findByDepartment($dep_id)
    {
        return Province::where('id_departamento', $dep_id)->get();
    }
}