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
        Schema::create('interaccion', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_interaccion');
            $table->unsignedBigInteger('id_farmaco')->unsigned(); 
            $table->string('nombre_interaccion');
            $table->string('recomendacion');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('id_farmaco')->references('id')->on('farmaco')->onDelete('cascade');
        });
    
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('interaccion');
    }
};
