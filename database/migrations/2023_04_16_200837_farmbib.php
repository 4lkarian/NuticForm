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
        Schema::create('relacionfb', function (Blueprint $table) {
           $table->id('id');
           $table->unsignedBigInteger('id_farmaco');
           $table->unsignedBigInteger('id_biblio')->nullable();
           $table->timestamps();
           $table->foreign('id_farmaco')->references('id')->on('farmaco')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('id_biblio')->references('id')->on('bibliografias')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relacionfb');
    }
};
