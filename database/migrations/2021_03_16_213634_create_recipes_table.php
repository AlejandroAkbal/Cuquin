<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            // Field constraints
            $table->unsignedBigInteger('user_id');

            // Values
            //TODO: recipe image URL
            //TODO: change "instructions" to "directions"
            $table->string('name')->unique();
            $table->text('description');
            $table->text('instructions');

            // Defaults
            $table->timestamps();

            // Constraints
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
