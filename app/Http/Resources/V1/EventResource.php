<?php

namespace App\Http\Resources\V1;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Resources\V1\RoomResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'room' => new RoomResource(Room::find($this->room_id)),
            'event_name' => $this->event_name,
            'reserved_by' => $this->reserved_by,
            'day' => $this->day,
            'start' => $this->start,
            'end' => $this->end,
            'lecturer' => $this->lecturer,
            'major' => $this->major,
            'description' => $this->description,
        ];
    }
}
