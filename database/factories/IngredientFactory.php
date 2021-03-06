<?php

namespace Database\Factories;

use App\Models\Ingredient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ingredient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,

            'name' => $this->faker->unique()->vegetableName()
        ];
    }
}
