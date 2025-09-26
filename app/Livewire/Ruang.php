<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\Event;



class Ruang extends Component
{
    public Room $room;
    public $roomEvents;

    public function mount(Room $room)
    {
        $this->room = $room;
        $this->roomEvents = Event::where('room_id', $room->id)->get();
        $this->dispatch('events-loaded', Events: $this->roomEvents);
    }

    public function render()
    {
        return view('livewire.ruang', [
            'room' => $this->room
        ]);
    }
}
