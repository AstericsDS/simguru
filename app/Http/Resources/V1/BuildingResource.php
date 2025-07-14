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
            'admin' => new UserResource(User::find($this->admin_id)),
            'campus' => new CampusResource(Campus::find($this->campus_id)),
            'name' => $this->name,
            'area' => $this->area,
            'floor' => $this->floor,
            'description' => $this->description,
            'address' => $this->address,
            'imagesPath' => json_decode($this->images_path),
            'status' => $this->status,
        ];
    }
}
