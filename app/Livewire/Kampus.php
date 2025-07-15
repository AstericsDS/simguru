<?php

namespace App\Livewire;

use App\Models\Building;
use App\Models\Campus;
use Livewire\Component;

class Kampus extends Component
{
    public function render()
    {
        $buildings = Building::all();
        return view('livewire.kampus',[
            'campuses' => $buildings
        ]);
    }
}
