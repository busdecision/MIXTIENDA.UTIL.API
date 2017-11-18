<?php

use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provincias = [
            [
                "des_provincia" => "Chachapoyas",
                "cod_provincia" => "0101",
                "est_provincia" => true,
                "id_departamento" => 1
            ],
            [
                "des_provincia" => "Condorcanqui",
                "cod_provincia" => "0104",
                "est_provincia" => true,
                "id_departamento" => 1
            ],
            [
                "des_provincia" => "Chincha",
                "cod_provincia" => "1102",
                "est_provincia" => true,
                "id_departamento" => 2
            ],
            [
                "des_provincia" => "Nasca",
                "cod_provincia" => "1103",
                "est_provincia" => true,
                "id_departamento" => 2
            ],
            [
                "des_provincia" => "Huaura",
                "cod_provincia" => "1508",
                "est_provincia" => true,
                "id_departamento" => 3
            ],
            [
                "des_provincia" => "Canta",
                "cod_provincia" => "1504",
                "est_provincia" => true,
                "id_departamento" => 4
            ]
        ];

        foreach ($provincias as $provincia) {
            \DB::table('zprovincia')->insert($provincia);
        }
    }
}
