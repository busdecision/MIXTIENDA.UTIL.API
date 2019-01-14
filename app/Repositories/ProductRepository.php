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

        $query = \DB::table('psryk_product as p')
                ->select(['*'])
                ->join('psryk_product_lang as l', 'p.id_product', '=', 'l.id_product')
                ->where('l.id_shop','=', 1)
                ->where('l.id_lang', '=', 1);

        if ($param) {
            $query = $query->where('l.name','LIKE', '%'. $param . '%');
        }

        $filtered_products = $query->get();

        return $filtered_products;
    }
}