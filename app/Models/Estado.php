<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = "zestado_archivo";

    protected $primaryKey = "id_estado_archivo";
}