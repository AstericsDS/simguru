<?php

namespace App\Livewire;

use App\Models\Building;
use App\Models\Campus;
use App\Models\Room;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Http;

class Homepage extends Component {

    public $selectedCampus, $selectedBuilding, $selectedRoom, $campusbuildings, $buildingrooms;

    public function updatedSelectedCampus($value){
        $this->campusbuildings = Building::where('campus_id', $value)->get();
    }

    public function updatedSelectedBuilding($value){
        $this->buildingrooms = Room::where('building_id', $value)->get();
    }

    public function mount(){
        $this->dispatch("graph", gedung: Building::count(), ruang: Room::count(), kampus: Campus::count());
    }

    public function render(){
        $campuses = Campus::all();
        $buildings = Building::all();
        $rooms = Room::where('show', true)->get();
        // Campus::when($this->search !== '', fn(Builder $query) => $query->where('name', 'like', '%' . $this->search . '%'))->get();
        // dd($campuses);
        return view('livewire.homepage', [
            'campusBuildings' => $this->campusbuildings,
            'buildingRooms' => $this->buildingrooms,
            'campuses' => $campuses,
            'buildings' => $buildings,
            'rooms' => $rooms
        ]);
    }
}
