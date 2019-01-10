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
            $filtered_products = \DB::table('ps_product as p')
                                ->select(['*'])
                                ->join('ps_product_lang as l', 'p.id_product', '=', 'l.id_product')
                                ->where('l.name','LIKE', '%'. $param . '%')
                                ->where('l.id_shop','=', 1)
                                ->where('l.id_lang', '=', 1)
                                ->get();
        } else {
            $filtered_products= \DB::table('ps_product as p')
                                ->select(['*'])
                                ->join('ps_product_lang as l', 'p.id_product', '=', 'l.id_product')
                                ->where('l.id_shop','=', 1)
                                ->where('l.id_lang', '=', 1)
                                ->get();;
        }

        return $filtered_products;
    }
}