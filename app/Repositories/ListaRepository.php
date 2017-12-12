<?php

namespace App\Repositories;

use App\Models\Lista;
use App\Models\School;
use App\Models\SchoolGrade;
use App\Models\SchoolGradePivot;
use Illuminate\Support\Collection;

class ListaRepository
{
    public function find($id)
    {
        if ($id) {
            $lista = Lista::with(['grupoProducto'])->find($id);
            $pivot = SchoolGradePivot::find($lista->id_grado_colegio);
            $lista->id_colegio = $pivot->id_colegio;
            $lista->id_grado_escolar = $pivot->id_grado_escolar;
            $grupoProducto = $lista->grupoProducto()->get();

            $formated = $grupoProducto->map(function ($item) {
                $item->cantidad = $item->pivot->cantidad;
                $item->des_detalle = $item->pivot->des_detalle;
                return $item;
            });

            $n_lista = new \stdClass();
            $n_lista->id_lista = $lista->id_lista;
            $n_lista->periodo = $lista->periodo;
            $n_lista->id_lista_archivo = $lista->id_lista_archivo;
            $n_lista->id_grado_colegio = $lista->id_grado_colegio;
            $n_lista->id_colegio = $lista->id_colegio;
            $n_lista->id_grado_escolar = $lista->id_grado_escolar;
            $n_lista->grupo_producto = $formated;

            return response()->json($n_lista);

        }
    }
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

        $school_grade_id = null;

        if($schoolGrade){
            $school_grade_id = $schoolGrade['id_grado_colegio'];
        }
        else{
            $updateSchool = School::find($id_school);
            $updateSchool->schoolGrades()->attach($id_school_grade);
            $updateSchool->save();
            $schoolGrade2 = SchoolGradePivot::where('id_colegio', $id_school)->where('id_grado_escolar', $id_school_grade)->first();

            $school_grade_id = $schoolGrade2['id_grado_colegio'];
        }

        //creating new lista
        $lista = new Lista();
        $lista->id_lista_archivo = $id_lista_archivo;
        $lista->id_grado_colegio = $school_grade_id;
        $lista->periodo = $periodo;

        $res = $this->verifyPeriod($lista->id_grado_colegio, $lista->periodo);
        if (!($res['result'])) {
            return response()->json(["errors" => "El periodo ya ha sido registrado"], 403);
        }

        $lista->save();

        foreach ($productsGroups as $group) {
            $r = \DB::table('zlista_detalle')->insert([
                "id_lista" => $lista->id_lista,
                "id_grupo_producto" => $group['id_grupo_producto'],
                "cantidad" => $group['cantidad'],
                "des_detalle" => $group['des_detalle'],
            ]);

        }


        //$lista->grupoProducto()->attach($productsGroups_id);

        //$lista->save();

        return $lista;

    }

    public function verifyPeriod($gradeID, $period)
    {
        $res = [
            "result" => true
        ];
        $lista = Lista::where('periodo', $period)->where('id_grado_colegio', $gradeID)->first();

        $res['result'] = sizeof($lista) > 0 ? false : true;

        return $res;
    }

    public function verifyPeriodBySchool($id_colegio, $id_grado_colegio, $period)
    {
        $res = ["result" => true];
        $schoolGrade = SchoolGradePivot::where('id_colegio', $id_colegio)->where('id_grado_escolar', $id_grado_colegio)->first();

        if ($schoolGrade == null) {
            $res['result'] = true;
        } else {
            $lista = Lista::where('periodo', $period)->where('id_grado_colegio', $schoolGrade->id_grado_colegio)->first();
            $res['result'] = sizeof($lista) > 0 ? false : true;
        }

        return $res;
    }
}