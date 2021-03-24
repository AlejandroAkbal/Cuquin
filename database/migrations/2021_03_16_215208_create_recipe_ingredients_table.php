<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_ingredients', function (Blueprint $table) {
            $table->primary(['recipe_id', 'ingredient_id']);

            // Field constraints
            $table->unsignedBigInteger('user_id');

            $table->unsignedBigInteger('recipe_id');
            $table->unsignedBigInteger('ingredient_id');

            // Values
            $table->float('quantity')->default(1);

            // Defaults
            $table->timestamps();

            // Constraints
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

            $table->foreign('recipe_id')->references('id')->on('recipes')->cascadeOnDelete();
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_ingredient');
    }
}
