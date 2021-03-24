<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default user
        User::factory()->create(['name' => 'Test Mc Testy', 'email' => 'test@example.com', 'password' => bcrypt('password')]);

        User::factory()->count(4)->create();
    }
}
