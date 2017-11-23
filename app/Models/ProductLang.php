<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLang extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = "psyk_product_lang";

    protected $primaryKey = "id_product";

}