<?php

use Illuminate\Database\Seeder;

class ColegioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = [
            [
                "des_colegio" => "Luis Fabio Xammar Jurado",
                "id_distrito" => 6,
                "id_proveedor" => 11,
                "ord_colegio"=> 12,
                "observacion" => "ejemplo observacion 1"
            ],
            [
                "des_colegio" => "CAYETANO HEREDIA",
                "id_distrito" => 6,
                "id_proveedor" => 23,
                "ord_colegio" => 44,
                "observacion"=> "ejemplo observacion 2"
            ]
        ];

        foreach ($schools as $school) {
            \DB::table('zcolegio')->insert($school);
        }
    }
}
