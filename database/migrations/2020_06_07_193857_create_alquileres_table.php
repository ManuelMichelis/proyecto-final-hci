<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlquileresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquileres', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_expiracion');
            $table->string('estado_al_cierre');
            $table->unsignedDouble('costo');
            $table->unsignedBigInteger('legajo_vendedor')->nullable();
            $table->string('patente_automovil')->nullable()->onDelete('cascade');
            $table->foreign('patente_automovil')->references('patente')->on('automoviles')->onDelete('cascade');
            $table->unsignedBigInteger('nro_cliente')->nullable()->onDelete('cascade');
            $table->foreign('nro_cliente')->references('nro')->on('clientes')->onDelete('cascade');
            $table->unsignedBigInteger('id_embargo_asociado')->nullable()->onDelete('cascade');
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
        Schema::dropIfExists('alquileres');
    }
}
