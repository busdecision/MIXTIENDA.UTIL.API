<?php

use Illuminate\Database\Seeder;

class GrupoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grupo_productos = [
            [
                "cod_grupo_producto" => "GP001",
                "des_grupo_producto" => "GRUPO 1",
                "id_color" => 1
            ],
            [
                "cod_grupo_producto" => "GP002",
                "des_grupo_producto" => "GRUPO 2",
                "id_color" => 2
            ],
            [
                "cod_grupo_producto" => "GP003",
                "des_grupo_producto" => "GRUPO 3",
                "id_color" => 3
            ]
        ];

        foreach ($grupo_productos as $grupo) {
            \DB::table('zgrupo_producto')->insert($grupo);
        }

    }
}
