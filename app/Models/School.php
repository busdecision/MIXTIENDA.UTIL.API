<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public $timestamps = true;

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_modificacion';

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = "zcolegio";

    protected $primaryKey = "id_colegio";

    protected $fillable = ['des_colegio', 'ord_colegio', 'observacion', 'id_distrito'];

    protected $hidden = ['fecha_creacion', 'fecha_modificacion'];

    public function district()
    {
        return $this->hasOne(District::class, 'id_distrito', 'id_distrito');
    }

    public function schoolGrades()
    {
        return $this->belongsToMany(SchoolGrade::class, 'zgrado_colegio', 'id_colegio', 'id_grado_escolar');
    }

}
