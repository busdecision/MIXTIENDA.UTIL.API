<?php

namespace App\Http\Controllers\API;

use App\Repositories\ParameterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParameterController extends Controller
{
    protected $parameterRepository;

    /**
     * ParameterController constructor.
     */
    public function __construct(ParameterRepository $parameterRepository)
    {
        $this->parameterRepository = $parameterRepository;
    }

    public function index()
    {
        return $this->parameterRepository->all();
    }

    public function show($id)
    {
        return $this->parameterRepository->find($id);
    }
}
