<?php

namespace App\Livewire;

use App\Models\Room;
use Livewire\Component;

class ListRuang extends Component
{
    public function render()
    {
        $rooms = Room::all();
        return view('livewire.listruang',[
            'rooms' => $rooms,
        ]);
    }
}
