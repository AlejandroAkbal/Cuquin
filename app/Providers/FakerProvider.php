<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FakerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\Faker\Generator::class, function () {
            $faker = \Faker\Factory::create();
            $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

            return $faker;
        });
    }
}
