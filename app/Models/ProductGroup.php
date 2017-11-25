<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    public $timestamps = true;

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_modificacion';
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = "zgrupo_producto";

    protected $primaryKey = "id_grupo_producto";

    protected $hidden = ['fecha_creacion', 'fecha_modificacion'];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'zgrupo_producto_detalle', 'id_grupo_producto', 'id_product');
    }
}