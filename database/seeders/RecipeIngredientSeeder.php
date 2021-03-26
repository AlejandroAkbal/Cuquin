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
        $recipes = Recipe::all()->random(5);
        $ingredients = Ingredient::all()->random(5);

        foreach ($ingredients as $ingredient) {
            $recipe = $recipes->random();

            $recipe->ingredients()->attach($ingredient);
        }
    }
}
