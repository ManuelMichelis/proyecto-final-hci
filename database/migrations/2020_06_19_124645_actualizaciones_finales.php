<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActualizacionesFinales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function ($table) {
            $table->string('api_token', 80)->after('password')
                                ->unique()
                                ->nullable()
                                ->default(null);
        });

        Schema::table('alquileres', function (Blueprint $table) {
            $table->foreign('id_embargo_asociado')->references('id')->on('embargos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alquileres', function (Blueprint $table) {
            $table->dropForeign('alquileres_id_embargo_asociado_foreign');
        });
    }
}
