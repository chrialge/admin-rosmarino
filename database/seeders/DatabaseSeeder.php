<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AllergySeeder;
use Database\Seeders\DishSeeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ReservationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            AllergySeeder::class,
            DishSeeder::class,
            CustomerSeeder::class,
            UserSeeder::class,
            ReservationSeeder::class,
        ]);
    }
}
