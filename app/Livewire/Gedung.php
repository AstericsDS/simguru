<?php

namespace App\Livewire;

use App\Models\Building;
use App\Models\Room;
use Livewire\Component;

class Gedung extends Component
{
    public function render()
    {
        $rooms = Room::all();
        return view('livewire.gedung',[
            'buildings' => $rooms,
        ]);
    }
}
