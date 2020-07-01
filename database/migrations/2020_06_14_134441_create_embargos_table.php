<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmbargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('embargos', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('estado');
            $table->unsignedBigInteger('legajo_repositor')->unique()->nullable();
            $table->foreign('legajo_repositor')->references('legajo')->on('empleados')->onDelete('cascade');
            $table->unsignedBigInteger('id_alquiler_incumplido')->unique()->nullable();
            $table->foreign('id_alquiler_incumplido')->references('id')->on('alquileres')->onDelete('cascade');
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
        Schema::dropIfExists('embargos');
    }
}
