<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\User;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::whereEmail('test@example.com')->first();

        Ingredient::factory()->create(['user_id' => $user->id]);

        Ingredient::factory()->count(4)->create();
    }
}
