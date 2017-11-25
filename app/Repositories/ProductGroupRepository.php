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
        $formated_product = [];
        $productGroup = ProductGroup::with(['product.lang'])->find($id);

        $productGroup = $productGroup->toArray();

        foreach($productGroup['product'] as $p){
            $formated_product[] =  (object)[
                "id_product" => $p['id_product'],
                "id_lang" =>$p['lang'][0]['id_lang'],
                "id_shop" => $p['lang'][0]['id_shop'],
                "description"=> $p['lang'][0]['description'],
                "description_short" => $p['lang'][0]['description_short'],
            ];

        }
        $productGroup['product'] = $formated_product;
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