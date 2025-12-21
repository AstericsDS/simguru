<?php

namespace App\Http\Resources\V1;

use App\Models\User;
use App\Models\Building;
use Illuminate\Http\Request;
use App\Http\Resources\V1\UserResource;
use App\Http\Resources\V1\BuildingResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'building' => new BuildingResource($this->building),
            'name' => $this->name,
            'floor' => $this->floor,
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'capacity' => $this->capacity,
            'description' => $this->description,
            'category' => $this->category,
        ];
    }
}