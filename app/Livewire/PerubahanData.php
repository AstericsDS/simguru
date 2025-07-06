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
            ->paginate(10); // You can change 10 to any per-page number

        // Then map the paginated items (not the whole collection)
        $updates->getCollection()->transform(function ($update) {
            $update->parsed_new_data = json_decode($update->new_data, true);
            return $update;
        });
        
        return view('livewire.perubahan-data', [
            'updates' => $updates,
        ]);
    }
}
