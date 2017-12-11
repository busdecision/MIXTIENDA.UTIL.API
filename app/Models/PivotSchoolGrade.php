<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PivotSchoolGrade extends Model
{
    public $timestamps = true;

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_modificacion';

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = "zgrado_colegio";

    protected $primaryKey = "id_grado_colegio";


    public function utiles()
    {
        return $this->hasMany(Lista::class, 'id_grado_colegio', 'id_grado_colegio');
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'id_colegio');
    }
}