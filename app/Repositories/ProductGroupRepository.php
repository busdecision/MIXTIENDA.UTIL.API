<?php

namespace App\Repositories;

use App\Models\ProductGroup;

class ProductGroupRepository
{
    public function search($param, $size)
    {
        $filtered_schools = [];

        if ($param) {

            $filtered_schools = ProductGroup::where('des_grupo_producto', 'LIKE', '%' . $param . '%')->paginate($size);
        } else {
            $filtered_schools= ProductGroup::paginate($size);
        }

        return $filtered_schools;
    }
}