<?php

namespace Database\Seeders;

use App\Models\RecipeIngredient;
use App\Models\User;
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
        $user = User::whereEmail('test@example.com')->first();

        RecipeIngredient::factory()->count(5)->create();
    }
}
