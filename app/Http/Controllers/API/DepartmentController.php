<?php

namespace App\Http\Controllers\API;

use App\Repositories\DepartmentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    protected $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository= $departmentRepository;
    }

    public function index()
    {
        return $this->departmentRepository->all();
    }
}
