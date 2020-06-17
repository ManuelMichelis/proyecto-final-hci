<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomovilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automoviles', function (Blueprint $table) {
            $table->string('patente')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->unsignedInteger('version');
            $table->string('color');
            $table->unsignedDouble('valor');
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
        Schema::dropIfExists('automoviles');
    }
}
