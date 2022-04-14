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
        Schema::create('revision', function (Blueprint $table) {
            $table->id();
            $table->integer('id_vehiculo')->nullable(true);
            $table->date('fecha_inspeccion')->nullable(true);            
            $table->integer('posicion')->nullable(true)->default('0');
            $table->integer('presion')->nullable(true)->default('0');
            $table->integer('accesibilidad')->nullable(true)->default('0');
            $table->integer('interior')->nullable(true)->default('0');
            $table->integer('id_neumaticos')->nullable(true)->default('0');
            $table->string('observaciones')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('revision');
    }
};
