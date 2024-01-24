<?php

namespace Database\Seeders;

use App\Models\Driver;
use Database\Factories\DriverFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = [
            'Toyota Corolla' => 1,
            'Ford Focus' => 1,
            'Honda Civic' => 1,

            'BMW 3 Series' => 2,
            'Audi A4' => 2,
            'Mercedes-Benz C-Class' => 2,

            'Tesla Model S' => 3,
            'Porsche Panamera' => 3,
            'Rolls-Royce Phantom' => 3,
        ];

        foreach ($models as $model => $categoryId) {
            $uniqueDriver = Driver::factory()->create();

            DB::table('cars')->insert([
                'model' => $model,
                'comfort_category_id' => $categoryId,
                'driver_id' => $uniqueDriver->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
