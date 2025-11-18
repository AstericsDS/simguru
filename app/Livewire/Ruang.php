<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\Event;

class Ruang extends Component
{
    public Room $room;
    public $roomEvents;
    public $campus;
    public $building;

    public function mount(Room $room)
    {
        $this->room = $room;
        $this->roomEvents = Event::where('room_id', $room->id)->get();
        $this->dispatch('events-loaded', Events: $this->roomEvents);
        $this->campus = Room::with('campus')->get();
        $this->building = Room::with('building')->get();
    }

    public function render()
    {
        return view('livewire.ruang', [
            'room' => $this->room
        ]);
    }
}
