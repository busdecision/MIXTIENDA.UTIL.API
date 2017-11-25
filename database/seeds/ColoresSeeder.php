<?php

use Illuminate\Database\Seeder;

class ColoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colores = [
            [
                "id_color" => 1,
                "des_color" => "Rojo"
            ],
            [
                "id_color" => 2,
                "des_color" => "Azul"
            ],
            [
                "id_color" => 3,
                "des_color" => "Verde"
            ]
        ];

        foreach ($colores as $color) {
            \DB::table('zcolor')->insert($color);
        }
    }
}
