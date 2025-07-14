<?php

namespace App\Http\Resources\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\V1\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PendingUpdateResource extends JsonResource
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
            'type' => $this->id,
            'table' => $this->table,
            'record_id' => $this->record_id,
            'old_data' => $this->old_data,
            'new_data' => json_decode($this->new_data),
            'status' => $this->status,
            'approvedBy' => new UserResource(User::find($this->approved_by)),
            'rejectReason' => $this->reject_reason,
        ];
    }
}
