<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->foodName();

        return [
            'user_id' => User::all()->random()->id,

            'name' => $name,
            'image' => $this->faker->imageUrl(640, 480, null, false, $name, true),
            'description' => $this->faker->text,
            'instructions' => $this->faker->text,
        ];
    }
}
