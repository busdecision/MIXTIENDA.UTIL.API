<?php

namespace App\Http\Controllers\API;

use App\Repositories\ArchivoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArchivoController extends Controller
{
    protected $archivoRepository;

    /**
     * ArchivoController constructor.
     */
    public function __construct(ArchivoRepository $archivoRepository)
    {
        $this->archivoRepository = $archivoRepository;
    }

    public function search(Request $request, $param)
    {
        $size = $request->get('size');

        $search_param = $param != "null" ? $param : null;

        return $this->archivoRepository->search($search_param, $size);
    }
}
