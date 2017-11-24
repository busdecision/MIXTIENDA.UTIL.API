<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function all()
    {
        return Product::with(['lang'])->get();
    }

    public function search($param)
    {
        $filtered_products = [];

        if ($param) {
            //$filtered_products = Product::where('des_grupo_producto', 'LIKE', '%' . $param . '%')->get();
        } else {
            $filtered_products= Product::all();
        }

        return $filtered_products;
    }
}