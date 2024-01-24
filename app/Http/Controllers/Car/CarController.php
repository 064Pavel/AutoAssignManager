<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function getAvailableCars(int $employeeId, $startTime, $endTime, string $model = null, int $comfortCategory = 1)
    {

        $availableCategories = $this->getAvailableCategories($employeeId);

        $carsNotInTrips = Car::whereDoesntHave('trips', function ($query) use ($startTime, $endTime) {
            $query->where(function ($query) use ($startTime, $endTime) {
                $query->whereBetween('start_time', [$startTime, $endTime])
                    ->orWhereBetween('end_time', [$startTime, $endTime]);
            });
        });

        if (!empty($availableCategories)) {
            $carsNotInTrips->where(function ($query) use ($availableCategories) {
                foreach ($availableCategories as $index => $category) {
                    if ($index === 0) {
                        $query->where('comfort_category_id', $category);
                    } else {
                        $query->orWhere('comfort_category_id', $category);
                    }
                }
            });
        }

        if ($model) {
            $carsNotInTrips->where('model', $model);
        }


        $result = $carsNotInTrips->get();

        return CarResource::collection($result);
    }



    private function getAvailableCategories(int $employeeId): array
    {
        $jobPost = $this->getJobPost($employeeId);

        if ($jobPost === 1) {
            return [1];
        } elseif ($jobPost === 2) {
            return [1, 2];
        } else {
            return [2, 3];
        }
    }

    private function getJobPost(int $employeeId): int
    {
        $jobPost = User::query()->where('id', $employeeId)->value('job_post_id');
        return (int)$jobPost;
    }


}
