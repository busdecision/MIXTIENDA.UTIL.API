<?php

namespace App\Repositories;


use App\Models\District;
use App\Models\Province;

class DistrictRepository
{
    public function all()
    {
        return District::all();
    }

    public function findByProvince($prov_id)
    {
        return District::where('id_provincia', $prov_id)->get();
    }
}