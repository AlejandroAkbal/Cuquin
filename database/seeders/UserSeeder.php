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
        User::factory()->count(1)->create(['email' => 'test@example.com', 'password' => 'password']);

//        User::factory()->count(4)->create();
    }
}
