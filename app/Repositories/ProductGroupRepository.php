<?php

namespace App\Repositories;

use App\Models\ProductGroup;

class ProductGroupRepository
{
    public function save($request)
    {

        $cod_grupo_producto = $request->get('cod_grupo_producto');
        $des_grupo_producto = $request->get('des_grupo_producto');
        $id_color = $request->get('id_color');
        $products_id = $request->get('products_id');

        $new_product_group = new ProductGroup();

        $new_product_group->cod_grupo_producto = $cod_grupo_producto;
        $new_product_group->des_grupo_producto = $des_grupo_producto;
        $new_product_group->id_color = $id_color;

        $new_product_group->save();

        $new_product_group->product()->attach($products_id);

    }

    public function update($request, $id)
    {
        $products_id = $request->get('products_id');


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