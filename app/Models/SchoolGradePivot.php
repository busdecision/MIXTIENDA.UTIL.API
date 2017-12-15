<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolGradePivot extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = "zgrado_colegio";

    protected $primaryKey = "id_grado_colegio";
}