<?php

namespace App\Http\Controllers\API;

use App\Models\School;
use App\Repositories\SchoolRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{
    protected $schoolRepository;

    public function __construct(SchoolRepository $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
    }

    public function index()
    {
        return $this->schoolRepository->all();
    }

    public function show($id)
    {
        return $this->schoolRepository->find($id);
    }

    public function search($param)
    {
        return $this->schoolRepository->search($param);
    }

    public function store(Request $request)
    {
        return $this->schoolRepository->save($request);
    }

    public function update(Request $request, $id)
    {

        return $this->schoolRepository->update($request, $id);
    }

    public function validateName($name){

        return $this->schoolRepository->validateName($name);
    }
}
