<?php

use Illuminate\Database\Seeder;

class ArchivoEstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            [
                "id_estado_archivo" => 1,
                "des_estado_archivo" => "Enviado"
            ],
            [
                "id_estado_archivo" => 2,
                "des_estado_archivo" => "Registrado"
            ],
        ];

        foreach ($estados as $estado) {
            \DB::table('zestado_archivo')->insert($estado);
        }
    }
}
