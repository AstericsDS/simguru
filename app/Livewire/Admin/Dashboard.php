<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use App\Models\Campus;
use Livewire\Component;
use App\Models\Building;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin.dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'campusCount' => Campus::count(),
            'buildingCount' => Building::count(),
            'roomCount' => Room::count(),
            'classCount' => Room::where('category', 'class')->count()
        ]);
    }
}
