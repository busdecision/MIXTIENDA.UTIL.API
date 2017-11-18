<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = "zprovincia";

    protected $primaryKey = "id_provincia";

    protected $fillable = ['id_departamento'];
}
