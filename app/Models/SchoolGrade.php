<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolGrade extends Model
{
    public $timestamps = true;

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_modificacion';

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = "zgrado_escolar";

    protected $primaryKey = "id_grado_escolar";
    protected $hidden = ['fecha_creacion', 'fecha_modificacion'];
}
