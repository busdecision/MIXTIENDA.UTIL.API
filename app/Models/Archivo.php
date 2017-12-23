<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    public $timestamps = true;

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_modificacion';
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = "zlista_archivo";

    protected $primaryKey = "id_lista_archivo";

    public function estado()
    {
        return $this->hasOne(Estado::class, 'id_estado_archivo', 'id_estado_archivo');
    }
}