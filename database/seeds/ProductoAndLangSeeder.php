<?php

use Illuminate\Database\Seeder;

class ProductoAndLangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products_ids = [
            [
                "id_product" => 1
            ],
            [
                "id_product" => 2
            ]
        ];

        foreach ($products_ids as $id) {
            \DB::table('psyk_product')->insert($id);
        }

        $product_langs = [
            [
                "id_product" => 1,
                "id_lang" => 2,
                "id_shop" => "SCHP1",
                "description" => "Test description 1",
                "description_short" => "Test description shor 1"
            ],
            [
                "id_product" => 2,
                "id_lang" => 3,
                "id_shop" => "SCHP2",
                "description" => "Test description 2",
                "description_short" => "Test description shor 2"
            ]
        ];

        foreach ($product_langs as $lang) {
            \DB::table('psyk_product_lang')->insert($lang);
        }
    }
}
