<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadHasAgendamiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_has_agendamiento', function (Blueprint $table) {
            $table->id();
            //$table->timestamps();

            $table->foreignId('actividad_id');
            $table->foreign('actividad_id')->references('id')->on('actividad');

            $table->foreignId('agendamiento_id');
            $table->foreign('agendamiento_id')->references('id')->on('agendamiento');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividad_has_agendamiento');
    }
}
