<?php

namespace App\Livewire;

use App\Models\Building;
use App\Models\Campus;
use App\Models\Room;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Http;

#[Title('Homepage')]
class Homepage extends Component
{
    public function render()
    {
        $campuses = Campus::all();
        $buildings = Building::all();
        $rooms = Room::all();
        // Campus::when($this->search !== '', fn(Builder $query) => $query->where('name', 'like', '%' . $this->search . '%'))->get();
        // dd($campuses);
        return view('livewire.homepage', [
            'campuses' => $campuses,
            'buildings' => $buildings,
            'rooms' => $rooms
        ]);
    }
}
