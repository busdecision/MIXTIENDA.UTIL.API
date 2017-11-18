<?php

namespace App\Http\Controllers\API;

use App\Repositories\SchoolGradeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolGradeController extends Controller
{
    protected $schoolGradeRepository;

    public function __construct(SchoolGradeRepository $schoolGradeRepository)
    {
        $this->schoolGradeRepository = $schoolGradeRepository;
    }

    public function index()
    {
        return $this->schoolGradeRepository->all();
    }
}
