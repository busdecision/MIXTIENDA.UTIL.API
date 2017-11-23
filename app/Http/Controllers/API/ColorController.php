<?php

namespace App\Http\Controllers\API;

use App\Repositories\ColorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    protected $colorRepository;

    public function __construct(ColorRepository $colorRepository)
    {
        $this->colorRepository= $colorRepository;
    }

    public function index()
    {
        return $this->colorRepository->all();
    }
}
