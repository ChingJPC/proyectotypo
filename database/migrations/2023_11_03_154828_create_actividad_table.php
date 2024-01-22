<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('actividad', function (Blueprint $table) {
        $table->id();
        $table->string('actividades_felinos');
        $table->string('actividades_canidos');
        $table->string('actividades_aves');
        //$table->unsignedBigInteger('id_actividad');
        //$table->unsignedBigInteger('id_agendamiento');
         


      
       // $table->foreign('id_agendamiento')->references('id')->on('agendamiento');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividad');
    }
};
