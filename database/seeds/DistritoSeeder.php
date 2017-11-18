<?php

use Illuminate\Database\Seeder;

class DistritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $distritos =
            [
                [
                    "cod_distrito" => "010103",
                    "des_distrito" => "Balsas",
                    "est_distrito" => true,
                    "id_provincia" => 1
                ],
                [
                    "cod_distrito" => "010401",
                    "des_distrito" => "Nieva",
                    "est_distrito" => true,
                    "id_provincia" => 2
                ],
                [
                    "cod_distrito" => "110205",
                    "des_distrito" => "El Carmen",
                    "est_distrito" => true,
                    "id_provincia" => 3
                ],
                [
                    "cod_distrito" => "110304",
                    "des_distrito" => "Marcona",
                    "est_distrito" => true,
                    "id_provincia" => 4
                ],
                [
                    "cod_distrito" => "150801",
                    "des_distrito" => "Huacho",
                    "est_distrito" => true,
                    "id_provincia" => 5
                ],
                [
                    "cod_distrito" => "150810",
                    "des_distrito" => "Santa Maria",
                    "est_distrito" => true,
                    "id_provincia" => 5
                ],
                [
                    "cod_distrito" => "150812",
                    "des_distrito" => "Vegueta",
                    "est_distrito" => true,
                    "id_provincia" => 5
                ],
                [
                    "cod_distrito" => "150404",
                    "des_distrito" => "Huaros",
                    "est_distrito" => true,
                    "id_provincia" => 6
                ],
            ];

        foreach ($distritos as $distrito) {
            \DB::table('zdistrito')->insert($distrito);
        }
    }
}
