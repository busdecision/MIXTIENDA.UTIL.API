<?php

namespace App\Repositories;

use App\Models\ProductGroup;
use Illuminate\Database\Eloquent\Collection;

class ProductGroupRepository
{
    public function save($request)
    {

        $cod_grupo_producto = $request->get('cod_grupo_producto');
        $des_grupo_producto = $request->get('des_grupo_producto');
        $id_color = $request->get('id_color');

        $products = $request->get('product');
        $products = new Collection($products);

        $products_id = $products->map(function($item){
            return $item['id_product'];
        });


        $new_product_group = new ProductGroup();

        $new_product_group->cod_grupo_producto = $cod_grupo_producto;
        $new_product_group->des_grupo_producto = $des_grupo_producto;
        $new_product_group->id_color = $id_color;

        $new_product_group->save();

        $new_product_group->product()->attach($products_id);

    }

    public function update($request, $id)
    {
        $products = $request->get('product');
        $products = new Collection($products);

        $products_id = $products->map(function($item){
            return $item['id_product'];
        });

        $product_group = ProductGroup::find($id);

        $product_group->cod_grupo_producto = $request->get('cod_grupo_producto');
        $product_group->des_grupo_producto = $request->get('des_grupo_producto');
        $product_group->id_color = $request->get('id_color');

        $product_group->save();

        $product_group->product()->sync($products_id);
    }

    public function find($id)
    {
        $productGroup = ProductGroup::with(['product.lang'])->find($id);
        return $productGroup;
    }

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