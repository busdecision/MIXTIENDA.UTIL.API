<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = "psyk_product";

    protected $primaryKey = "id_product";

    public function lang()
    {
        return $this->hasMany(ProductLang::class, 'id_product')->where('id_shop',1)->where('id_lang', 2);
    }
}