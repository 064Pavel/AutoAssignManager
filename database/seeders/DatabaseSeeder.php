<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Trip;
use App\Models\User;
use Database\Factories\TripFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
           JobPostSeeder::class,
        ]);

         User::factory(10)->create();

        $this->call([
            ComfortCategoriesSeeder::class,
            CarSeeder::class,
        ]);

        Trip::factory(1)->create();
    }
}
