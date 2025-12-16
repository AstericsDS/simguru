<?php

namespace App\Livewire;

use App\Models\Building;
use Livewire\Component;

class Gedung extends Component
{
    public Building $building;
    public $campus;

    public function mount(Building $building)
    {
        $this->building = $building;
        $this->campus = Building::with('campus')->get();
    }

    public function render()
    {
        $rooms = $this->building->room;
        return view('livewire.gedung',[
            'building' => $this->building,
            'rooms' => $rooms,
        ]);
    }
}
