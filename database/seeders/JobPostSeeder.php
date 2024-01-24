<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobPosts = [
            "Worker",
            "Admin",
            "Boss"
        ];

        foreach ($jobPosts as $jobPost){
            DB::table('job_posts')->insert(['job_post' => $jobPost]);
        }
    }
}
