<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComfortCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Standard',
            'Comfort',
            'Premium',
        ];

        foreach ($categories as $category){
            DB::table('comfort_categories')->insert(['category_name' => $category]);
        }
    }
}
