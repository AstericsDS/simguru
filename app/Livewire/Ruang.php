<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;


class Ruang extends Component
{
    public Room $room;

    public function mount(Room $room)
    {
        $this->room = $room;
    }

    public function render()
    {
        return view('livewire.ruang', [
            'room' => $this->room
        ]);
    }
}
