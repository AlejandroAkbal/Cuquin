<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recipes = Recipe::all();
        $ingredients = Ingredient::all();


        foreach (range(1, 5) as $number) {
            $recipe = $recipes->random();
            $ingredient = $ingredients->random();

            $recipe->ingredients()->attach($ingredient);
        }
    }
}
