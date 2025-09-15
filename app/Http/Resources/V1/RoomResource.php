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
        $building = Building::find($this->building_id);
        return [
            'id' => $this->id,
            'admin' => new UserResource(User::find($this->admin_id)),
            'name' => $this->name,
            'campus' => $building->campus->name,
            'building' => $building->name,
            'floor' => $this->floor,
            'capacity' => $this->capacity,
            'description' => $this->description,
            'images_path' => $this->images_path,
            'status' => $this->status,
        ];
    }
}