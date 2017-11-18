<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = "zdistrito";

    protected $primaryKey = "id_distrito";

    public function province()
    {
        return $this->hasOne(Province::class, 'id_provincia', 'id_provincia');
    }
}
