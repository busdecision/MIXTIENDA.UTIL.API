<?php

use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departamentos = [
            [
                "des_departamento" => "Amazonas",
                "cod_departamento" => "01",
                "est_departamento" => true
            ],
            [
                "des_departamento" => "Ica",
                "cod_departamento" => "11",
                "est_departamento" => true
            ],
            [
                "des_departamento" => "Lima",
                "cod_departamento" => "15",
                "est_departamento" => true
            ],
            [
                "des_departamento" => "Chincha",
                "cod_departamento" => "15",
                "est_departamento" => true
            ],
        ];

        foreach ($departamentos as $departamento) {
            \DB::table('zdepartamento')->insert($departamento);
        }
    }
}
