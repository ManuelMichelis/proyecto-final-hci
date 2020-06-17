<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('legajo');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('localidad');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email_usuario')->unique()->nullable()->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Elimino la restricción de llave foránea en la tabla usuarios para proceder a la eliminación
        Schema::table('usuarios', function(Blueprint $table) {
            $table->dropForeign('usuarios_legajo_empleado_foreign');
        });
        Schema::dropIfExists('empleados');
    }
}
