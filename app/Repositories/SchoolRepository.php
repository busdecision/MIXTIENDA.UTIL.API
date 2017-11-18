<?php

namespace App\Repositories;

use App\Models\School;
use Mockery\CountValidator\Exception;

class SchoolRepository
{
    public function all()
    {

        return School::all();
    }

    public function find($id)
    {
        $school = School::with(['district.province', 'schoolGrades'])->find($id);
        return $school;
    }

    public function search($param)
    {
        $filtered_schools = [];

        if ($param) {
            $filtered_schools = School::where('des_colegio', 'LIKE', '%' . $param . '%')->get();
        } else {
            $filtered_schools::all();
        }

        return $filtered_schools;

    }

    public function save($request)
    {

        $id_colegio = $request->get('id_colegio');

        $validateIfExists = $this->find($id_colegio);

        if(isset($validateIfExists)){
            return response()->json(["error" => [ "message" => "Este ID ya existe"]], 400);
        }

        $des_colegio = $request->get('des_colegio');
        $id_distrito = $request->get('id_distrito');
        $observacion = $request->get('observacion');
        $school_grades_id = $request->get('school_grades_id');

        $new_school = new School();

        $new_school->id_colegio = $id_colegio;
        $new_school->des_colegio = $des_colegio;
        $new_school->id_distrito = $id_distrito;
        $new_school->observacion = $observacion;

        $new_school->save();

        $new_school->schoolGrades()->attach($school_grades_id);
    }

    public function update($request, $id)
    {

        $school_grades_id = $request->get('school_grades_id');

        $school = School::find($id);

        $school->id_colegio = $request->get('id_colegio');
        $school->des_colegio = $request->get('des_colegio');
        $school->id_distrito = $request->get('id_distrito');
        $school->observacion = $request->get('observacion');

        $school->save();

        $school->schoolGrades()->sync($school_grades_id);

    }

    public function validateName($name)
    {
        $response = [
            "exists" => false,
            "name_founded" => null
        ];
        $filtered_school = null;

        if ($name) {
            $filtered_school = School::where('des_colegio', $name)->first();
        }

        if (sizeof($filtered_school) > 0) {
            $response['exists'] = true;
            $response['name_founded'] = $filtered_school->des_colegio;
        } else {
            $response['exists'] = false;
        }

        return $response;
    }
}
