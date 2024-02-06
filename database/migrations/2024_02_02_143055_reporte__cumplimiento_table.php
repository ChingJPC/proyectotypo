<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReporteCumplimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_cumplimiento', function (Blueprint $table) {
            $table->id();
            $table->boolean('si_cumplio');
            $table->boolean('no_cumplio');
            $table->unsignedBigInteger('logros_id');
            $table->foreign('logros_id')->references('id')->on('logros');
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users'); 
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
        Schema::dropIfExists('Reporte_Cumplimiento');
    }
}