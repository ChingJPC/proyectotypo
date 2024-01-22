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
        Schema::create('agendamiento', function (Blueprint $table) {
            $table->id();
            $table->string('Actividades_a_Realizar');
            $table->datetime('Fecha_Agendamiento');
            $table->tinyinteger('Tiempo_Disponible');
            $table->string('Nombre_Mascota');
            $table->timestamps();
            
            
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamiento');
    }
};
