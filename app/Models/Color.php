<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = "zcolor";

    protected $primaryKey = "id_color";
}