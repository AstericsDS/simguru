<?php

namespace App\Livewire;

use App\Models\Campus;
use Livewire\Component;
use App\Models\Building;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'campusCount' => Campus::count(),
            'buildingCount' => Building::count()
        ]);
    }
}