<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = "zgrupo_producto";

    protected $primaryKey = "id_grupo_producto";
}