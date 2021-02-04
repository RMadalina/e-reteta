<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes_medicines', function (Blueprint $table) {
            $table->foreignId('recipe_id')->constrained()->onDelete('cascade');
            $table->integer('medicinecode');
            $table->foreign('medicinecode')->references('medicinecode')->on('medicines')->onDelete('cascade');
            $table->integer('quantity');
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
        Schema::dropIfExists('recipes_medicines');
    }
}
