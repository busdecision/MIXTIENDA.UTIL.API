<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    public $timestamps = true;

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_modificacion';

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = "zlista";

    protected $primaryKey = "id_lista";

    //protected $fillable = ['des_colegio', 'ord_colegio', 'observacion', 'id_distrito'];

    protected $hidden = ['fecha_creacion', 'fecha_modificacion'];

    public function grado()
    {
        return $this->belongsTo(PivotSchoolGrade::class, 'id_grado_colegio');
    }

    public function productGroup()
    {
        return $this->belongsToMany(ProductGroup::class, 'zlista_detalle', 'id_lista', 'id_grupo_producto');
    }

}