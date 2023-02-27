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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ["fabricante","importador","distribuidor","expendedor"]);
            $table->string('nombre', 40);
            $table->string('cuit', 15);
            $table->string('domicilio_empresa', 80);
            $table->string('telefono_empresa', 15);
            $table->string('titular', 40);
            $table->string('dni_titular', 10);
            $table->string('asesor', 40);
            $table->string('matricula', 15);
            $table->string('domicilio_asesor', 80);
            $table->string('dni_asesor', 10);
            $table->string('telefono_asesor', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
