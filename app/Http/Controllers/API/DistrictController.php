<?php

namespace App\Http\Controllers\API;

use App\Repositories\DistrictRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    protected $districtRepository;

    public function __construct(DistrictRepository $districtRepository)
    {
        $this->districtRepository = $districtRepository;
    }

    public function index()
    {
        return $this->districtRepository->all();
    }

    public function findByProvince($prov_id)
    {
        return $this->districtRepository->findByProvince($prov_id);
    }
}
