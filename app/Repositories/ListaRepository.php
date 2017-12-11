<?php

namespace App\Repositories;

use App\Models\Lista;
use App\Models\SchoolGradePivot;
use Illuminate\Support\Collection;

class ListaRepository
{
    public function search($param, $size)
    {
        $q = \DB::table('zlista as lista')
            ->select(['*'])
            ->join('zgrado_colegio as gradoCo', 'gradoCo.id_grado_colegio', '=', 'lista.id_grado_colegio')
            ->join('zcolegio as colegio', 'colegio.id_colegio', '=', 'gradoCo.id_colegio')
            ->join('zgrado_escolar as gradoEs', 'gradoEs.id_grado_escolar', '=', 'gradoCo.id_grado_escolar');

        if ($param) {
            $q = $q->where('colegio.des_colegio', 'LIKE', '%' . $param . '%');
        }

        //dd($param, $size);
        return $q->paginate($size);

    }

    public function save($request)
    {
        $id_school = $request->get('id_colegio');
        $id_school_grade = $request->get('id_grado_escolar');
        $id_lista_archivo = $request->get('id_lista_archivo');
        $periodo = $request->get('periodo');

        $productsGroups = $request->get('grupo_producto');
        $productsGroups = new Collection($productsGroups);

        $productsGroups_id = $productsGroups->map(function ($item) {
            return $item['id_grupo_producto'];
        });

        //getting pivot table
        $schoolGrade = SchoolGradePivot::where('id_colegio', $id_school)->where('id_grado_escolar', $id_school_grade)->first();

        //creating new lista
        $lita = new Lista();

        $lita->id_lista_archivo = $id_lista_archivo;
        $lita->id_grado_colegio = $schoolGrade['id_grado_colegio'];
        $lita->periodo = $periodo;

        if (!($this->verifyPeriod($lita->id_grado_colegio, $lita->periodo))) {
            return response()->json(["errors" => "El periodo ya ha sido registrado"], 404);
        }

        $lita->save();

        $lita->productGroup()->attach($productsGroups_id);

        $lita->save();

        return $lita;

    }

    public function verifyPeriod($gradeID, $period)
    {
        $lista = Lista::where('periodo', $period)->where('id_grado_colegio', $gradeID)->first();
        return sizeof($lista) > 0 ? false : true;
    }
}