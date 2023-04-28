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
        Schema::create('farmaco', function (Blueprint $table) {
            $table->id('id');
            $table->string('farmaco');
            $table->string('mecanismo');
            $table->string('url');
            $table->string('efecto');
            $table->unsignedBigInteger('id_grupo')->unsigned();
            $table->string('status');
           
            $table->timestamps();

            $table->foreign('id_grupo')->references('id')->on('grupoFarmacos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmaco');
    }
};
