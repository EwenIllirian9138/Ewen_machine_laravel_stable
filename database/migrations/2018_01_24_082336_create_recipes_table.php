<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->integer('boisson_id')->index('boisson_id')->foreign('$boisson_id')->references('id')->on('boisson');
            $table->integer('ingredient_id')->index('ingredient_id')->foreign('ingredient_id')->references('id')->on('ingredient');
            $table->integer('amount');
        });
        Schema::enableForeignKeyConstraints();
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Recipes');
    }
}
