<?php

namespace App\Http\Resources\V1;

use App\Models\User;
use App\Models\Campus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BuildingResource extends JsonResource
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
            'campus' => new CampusResource(Campus::find($this->campus_id)),
            'name' => $this->name,
            'building_area' => $this->building_area,
            'land_area' => $this->land_area,
            'floor' => $this->floor,
            'description' => $this->description,
            'address' => $this->address,
        ];
    }
}
