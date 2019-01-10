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
            \DB::table('ps_product')->insert($id);
        }

        $product_langs = [
            [
                "id_product" => 1,
                "id_lang" => 2,
                "id_shop" => 1,
                "description" => "Test description 1",
                "description_short" => "Test description short 1"
            ],
            [
                "id_product" => 2,
                "id_lang" => 3,
                "id_shop" => 2,
                "description" => "Test description 2",
                "description_short" => "Test description short 2"
            ],
            [
                "id_product" => 3,
                "id_lang" => 2,
                "id_shop" => 1,
                "description" => "Test description 3",
                "description_short" => "Test description short 3"
            ]
        ];

        foreach ($product_langs as $lang) {
            \DB::table('ps_product_lang')->insert($lang);
        }
    }
}
