<?php

use Illuminate\Database\Seeder;

class GradoEscolarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gradosEscolares =
            [
                [
                    "des_grado_escolar" => "2 a",
                    "nivel_grado_escolar" => "Inicial",
                ],
                [
                    "des_grado_escolar" => "3 a",
                    "nivel_grado_escolar" => "Inicial",
                ],
                [
                    "des_grado_escolar" => "4 a",
                    "nivel_grado_escolar" => "Inicial",
                ],
                [
                    "des_grado_escolar" => "5 a",
                    "nivel_grado_escolar" => "Inicial",
                ],
                [
                    "des_grado_escolar" => "1 Grado",
                    "nivel_grado_escolar" => "Primaria",
                ],
                [
                    "des_grado_escolar" => "2 Grado",
                    "nivel_grado_escolar" => "Primaria",
                ],
                [
                    "des_grado_escolar" => "3 Grado",
                    "nivel_grado_escolar" => "Primaria",
                ],
                [
                    "des_grado_escolar" => "4 Grado",
                    "nivel_grado_escolar" => "Primaria",
                ],
                [
                    "des_grado_escolar" => "5 Grado",
                    "nivel_grado_escolar" => "Primaria",
                ],
                [
                    "des_grado_escolar" => "1 Secundaria",
                    "nivel_grado_escolar" => "Secundaria",
                ],
                [
                    "des_grado_escolar" => "2 Secundaria",
                    "nivel_grado_escolar" => "Secundaria",
                ],
                [
                    "des_grado_escolar" => "3 Secundaria",
                    "nivel_grado_escolar" => "Secundaria",
                ],
                [
                    "des_grado_escolar" => "4 Secundaria",
                    "nivel_grado_escolar" => "Secundaria",
                ],
                [
                    "des_grado_escolar" => "5 Secundaria",
                    "nivel_grado_escolar" => "Secundaria",
                ],
            ];

        foreach ($gradosEscolares as $grado) {
            \DB::table('zgrado_escolar')->insert($grado);
        }
    }
}
