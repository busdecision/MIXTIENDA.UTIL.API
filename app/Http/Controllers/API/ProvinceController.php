<?php

namespace App\Http\Controllers\API;

use App\Repositories\ProvinceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProvinceController extends Controller
{
    protected $provinceRepository;

    public function __construct(ProvinceRepository $provinceRepository)
    {
        $this->provinceRepository= $provinceRepository;
    }

    public function index()
    {
        return $this->provinceRepository->all();
    }

    public function show($id){

        return $this->provinceRepository->find($id);
    }

    public function findByDepartment($dep_id){

        return $this->provinceRepository->findByDepartment($dep_id);
    }

}
