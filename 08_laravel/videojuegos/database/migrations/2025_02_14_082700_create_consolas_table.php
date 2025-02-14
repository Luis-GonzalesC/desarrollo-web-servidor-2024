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
        Schema::create('consolas', function (Blueprint $table) {
            $table->id(); //Crea una columna ID que es un INT AUTO INCREMENT
            $table->string('nombre')->unique(); //Crea una columna que sea nombre y que sea único
            $table->integer('ano_lanzamiento'); //Crea una columna con el año de lanzamiento
            $table->timestamps(); //Crea las columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consolas');
    }
};
