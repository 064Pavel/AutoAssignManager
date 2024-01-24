<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "model" => $this->model,
            "comfort_category" => ComfortCategoryResource::make($this->comfort_category),
            "driver" => DriverResource::make($this->driver),
        ];
    }
}
