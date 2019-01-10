<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyListaArchivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('zlista_archivo', function (Blueprint $table) {
            $table->string('correo')->nullable();
            $table->string('telefono')->nullable();
            $table->string('ref_colegio')->nullable();
            $table->string('ref_grado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zlista_archivo', function (Blueprint $table) {
            $table->dropColumn('correo');
            $table->dropColumn('telefono');
            $table->dropColumn('ref_colegio');
            $table->dropColumn('ref_grado');
        });
    }
}
