<?php

namespace Database\Factories;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeIngredientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecipeIngredient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,

            'recipe_id' => Recipe::all()->random()->id,
            'ingredient_id' => Ingredient::all()->random()->id,
        ];
    }
}
