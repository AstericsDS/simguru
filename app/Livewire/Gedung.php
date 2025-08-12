<?php

namespace App\Livewire;

use App\Models\Building;
use App\Models\Room;
use Livewire\Component;

class Gedung extends Component
{
    public Building $building;

    public function mount(Building $building)
    {
        $this->building = $building;
    }

    public function render()
    {
        return view('livewire.gedung',[
            'building' => $this->building,
        ]);
    }
}
