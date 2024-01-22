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
    Schema::create('informacion_actividad', function (Blueprint $table) {
        $table->id();
        $table->string('Nombre_Mascota');
        $table->tinyinteger('Edad');
        $table->string('Raza');
        $table->tinyinteger('Peso');
        $table->timestamps();

        $table->unsignedBigInteger('id_informacion');
        $table->unsignedBigInteger('id_actividad');

        $table->foreign('id_informacion')->references('id')->on('informacion');
        $table->foreign('id_actividad')->references('id')->on('actividad');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion_actividad');
    }
};
