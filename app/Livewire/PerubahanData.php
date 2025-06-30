<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PendingUpdate;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin.dashboard')]
class PerubahanData extends Component
{
    public function render()
    {
        $updates = PendingUpdate::with(['admin', 'approver'])
                    ->where('status', 'pending')
                    ->get()
                    ->map(function ($update){
                        $update->parsed_new_data = json_decode($update->new_data, true);
                        return $update;
                    });
        return view('livewire.perubahan-data', [
            'updates' => $updates,
        ]);
    }
}
