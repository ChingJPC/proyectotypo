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
        //

        Schema::create('Reporte_Cumplimiento', function (Blueprint $table) {
            $table->id();
            $table->integer('si_cumplio');
            $table->integer('no_cumplio');
            $table->foreignId('logros_id');
            $table->foreign('logros_id')->references('id')->on('logros');
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
