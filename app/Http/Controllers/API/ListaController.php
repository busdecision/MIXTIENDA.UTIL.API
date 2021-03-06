<?php

namespace App\Http\Controllers\Api;

use App\Repositories\ListaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListaController extends Controller
{
    protected $listaRepository;

    public function __construct(ListaRepository $listaRepository)
    {
        $this->listaRepository = $listaRepository;
    }

    public function search(Request $request, $param)
    {
        $size = $request->get('size');
        $search_param = $param != "null" ? $param : null;

        return $this->listaRepository->search($search_param, $size);
    }

    public function show($id)
    {
        return $this->listaRepository->find($id);
    }

    public function store(Request $request)
    {
        return $this->listaRepository->save($request);
    }

    public function update(Request $request, $id)
    {

        return $this->listaRepository->update($request, $id);
    }

    public function verifyPeriod(Request $request)
    {
        $id_colegio = $request->get('id_colegio');
        $id_grado_colegio = $request->get('id_grado_escolar');
        $period = $request->get('period');

        return $this->listaRepository->verifyPeriodBySchool($id_colegio, $id_grado_colegio, $period);
    }
}
