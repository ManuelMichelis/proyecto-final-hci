<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('empleados', function (Blueprint $table) {
            $table->foreign('email_usuario')
                -> references('email')
                -> on('usuarios')
                -> onDelete('cascade');
        });

        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('legajo_empleado')
                -> references('legajo')
                -> on('empleados')
                -> onDelete('cascade');
        });

        Schema::table('gestion_alquileres', function (Blueprint $table) {
            // Establezco la llave primaria sobre la relación gestion_alquileres
            $table->primary('id_alquiler');
            // Establezco las llaves foráneas de la tabla pivot: gestion_alquileres
            $table->foreign('legajo_vendedor')
                -> references('legajo')
                -> on('empleados')
                -> onDelete('cascade');
            $table->foreign('id_alquiler')
                -> references('id')
                -> on('alquileres')
                -> onDelete('cascade');
        });

        Schema::table('embargos', function (Blueprint $table) {
            // Establezco la llave primaria sobre la relación embargos
            $table->primary('id_alquiler');
            // Establezco las llaves foráneas de la tabla pivot: embargos
            $table->foreign('legajo_repositor')
                -> references('legajo')
                -> on('empleados')
                -> onDelete('cascade');
            $table->foreign('id_alquiler')
                -> references('id')
                -> on('alquileres')
                -> onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
