<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->id('id_vehiculo');
            $table->integer('identificador')->nullable(true);
            $table->string('codigo')->nullable(true);
            //$table->date('fecha_inspeccion')->nullable(true);
            $table->integer('km_inspeccion')->nullable(true)->default('0');
            //$table->integer('posicion')->nullable(true)->default('0');
            //$table->integer('presion')->nullable(true)->default('0');
            $table->string('estado')->nullable(true);
            //$table->integer('accesibilidad')->nullable(true)->default('0');
            //$table->integer('interior')->nullable(true)->default('0');
            //$table->integer('id_neumaticos')->nullable(true)->default('0');
            //$table->string('observaciones')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('vehiculo');
    }
};
