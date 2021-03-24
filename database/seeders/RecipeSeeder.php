<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::whereEmail('test@example.com')->first();

        Recipe::factory()->create(['user_id' => $user->id]);

        Recipe::factory()->count(4)->create();
    }
}
